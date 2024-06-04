<?php
namespace Servicio\SoapConf;

use ReaderResponse\DomCdrReader;
use ReaderResponse\XmlReader;
use CustomHeaders;
use Models\Error\Error;
use Models\Response\CdrResponse;
use Models\Responser\RespuestaSend;
use Models\Responser\RespuestaResumen;
use SoapClient;
use Ejecucion\Serializar;
use Ejecucion\Sunat;
use Exception;
use SoapFault;


require APPPATH. '/controllers/ReaderResponse/DomCdrReader.php';
require APPPATH. '/controllers/ReaderResponse/XmlReader.php';
require APPPATH. '/helpers/Soap/CustomHeaders_helper.php';
require APPPATH. '/helpers/Soap/SoapClientDebug_helper.php';
require APPPATH. '/controllers/Models/Responser/RespuestaSend.php';
require APPPATH. '/controllers/Models/Responser/RespuestaResumen.php';
require APPPATH. '/controllers/Models/Responser/CdrResponse.php';
require APPPATH. '/controllers/Ejecucion/Sunat.php';
//require APPPATH. '/controllers/Ejecucion/Serializar.php';


class SoapSend {

    private $client;

    public function SetSoap($params){
        
        $resultado=new RespuestaSend;
        try{
            $b1=$this->VerifyWS($params->getEndPointUrl());
            if (!$b1)
            {
                throw new Exception('Error al Iniciar la peticion al WS');
            }
            $options = array(
                'cache_wsdl'    =>WSDL_CACHE_NONE,
                'soap_version'  =>SOAP_1_1,
                'trace'         =>true,
                'exceptions'    =>true,                
            );
            
            error_reporting(E_ALL ^ E_WARNING);
            libxml_disable_entity_loader(false);
            
            
            $client=new SoapClient($params->getEndPointUrl(),$options);
            
            $headers=new CustomHeaders($params->getRuc().$params->getUsuarioSol(),$params->getClaveSol());
            $client->__setSoapHeaders($headers);
            $this->client=$client;
            
            
            $resultado->setExito(true);
            
            return $resultado;

        }
        catch(SoapFault $e){
            $error=new Error;
            $exmess=$e->getMessage();
            $resultado->setExito(false);
            $error->setCode('WSS1');
            $error->setMessage(str_replace("'","",$exmess));
            $resultado->setError($error);
            return $resultado;
          
        }
        catch(Exception $e){
            //echo 'soapexepcion: '.$e->getMessage();
            $error=new Error;
            $exmess=$e->getMessage();
            $resultado->setExito(false);
            $error->setCode('WSS2');
            $error->setMessage(str_replace("'","",$exmess));
            $resultado->setError($error);
            return $resultado;
            
        }
    }
    
   


    public function SendBills($TramaZip,$NombreArchivo){
       /* if (!$this->VerifyWS()){
            
        } */
        
        $params = array(
            'fileName' =>$NombreArchivo.'.zip',
            'contentFile' =>$TramaZip,
            'partyType' =>''
        );
        //print_r(base64_encode($TramaZip));
        
        $result=new RespuestaSend;
        try{
            //set_error_handler(($this));
           /*  error_reporting(E_ALL);
            set_error_handler(array($this,'exception_error_handler'));  */
            
            error_reporting(E_ALL ^ E_WARNING);
            libxml_disable_entity_loader(true);
            $app=$this->client->__Soapcall('sendBill', ['parameters' => $params]);
            $request=$this->client->__getLastRequest()."\n";
            $response=$this->client->__getLastResponse()."\n";
            
         
           //print_r($app);
            $zipresponse=$app->applicationResponse;
            
            /* $CdrReader=new DomCdrReader(new XmlReader);
            $Extract= new Serializar;
            $xml=$Extract->GenerarRespuesta($zipresponse);
            $resultado2=$CdrReader->getCdrResponse($xml); */
            $result
                ->setConstanciaDeRecepcion($zipresponse)
                ->setExito(true)
                ->setRespuestaCDR('');

          /*   $result->setConstanciaDeRecepcion($params['fileName']);
            $result->setExito(true); */
            return $result;
        }
       
        catch(SoapFault $soapfault){

            $ejec=new Sunat;
            $result->setExito(false);
            $error=new Error;
            $error=$ejec->getErrorFromFault($soapfault);
            //var_dump($error);
            $result->setError($error);
            //var_dump($result);
            return $result;
            
            //var_dump($soapfault);
        }
        catch(Exception $ex){
            $error=new Error;
            $result->setExito(false);
            $error->setCode('WSF1');
            $error->setMessage($ex->getMessage());
            $result->setError($error);
            return $result;

            //echo $soapfault->detail->message;
           
            //$result=new Error;
            

            //echo 'error';
            //var_dump($soapfault);
            /* echo "Request :<br>", htmlentities($client->__getLastRequest()), "<br>";
            echo "Response :<br>", htmlentities($client->__getLastResponse()), "<br>"; */
        }
    }

    public function SendSummary($TramaZip,$NombreArchivo){
         $params = array(
             'fileName' =>$NombreArchivo.'.zip',
             'contentFile' =>$TramaZip,
             'partyType' =>''
         );
         
         $result=new RespuestaResumen;
         try{
             
             error_reporting(E_ALL ^ E_WARNING);
             libxml_disable_entity_loader(true);
             $resapp=$this->client->__Soapcall('sendSummary', ['parameters' => $params]);
           /*   $request=$this->client->__getLastRequest()."\n";
             $response=$this->client->__getLastResponse()."\n"; */

             $NumeroTicket=$resapp;

             $result
                 ->setNumeroTicket($NumeroTicket)
                 ->setExito(true);
             return $result;
         }
        
         catch(SoapFault $soapfault){
 
             $ejec=new Sunat;
             $result->setExito(false);
             $error=new Error;
             $error=$ejec->getErrorFromFault($soapfault);
             $result->setError($error);
            
             return $result;
             
             //var_dump($soapfault);
         }
         catch(Exception $ex){
             $error=new Error;
             $exmess=$ex->getMessage();
             $result->setExito(false);
             $error->setCode('WSR1');
             $error->setMessage(str_replace("'","",$exmess));
             $result->setError($error);
             return $result;
         }
     }

    private function VerifyWS($urlEndpoint)
        {
            $content = @file_get_contents($urlEndpoint);
            $a=@get_headers($urlEndpoint);
            
            if (is_array($a)){
                return true;
            }else{
                return false;
            }

            /*     if (strpos($http_response_header[0], "200")) { 
                    var_dump($content);
                    return true;
                } else { 
                    
                    return false;
                } */
        }
    public function ConsultarTicket($nroTicket){
        $params = array(
            'ticket' =>$nroTicket
        );
        
        $result=new RespuestaSend;
        try{
            //set_error_handler(($this));
           /*  error_reporting(E_ALL);
            set_error_handler(array($this,'exception_error_handler'));  */
            
            error_reporting(E_ALL ^ E_WARNING);
            libxml_disable_entity_loader(true);
            $app=$this->client->getStatus($params);
            
/*             $request=$this->client->__getLastRequest()."\n";
            $response=$this->client->__getLastResponse()."\n";
             */
         
           //print_r($app);
            $zipresponse=$app->status->content;
            $estado=$app->status->statusCode;
            
            
            /* $CdrReader=new DomCdrReader(new XmlReader);
            $Extract= new Serializar;
            $xml=$Extract->GenerarRespuesta($zipresponse);
            $resultado2=$CdrReader->getCdrResponse($xml); */
            $result
                ->setConstanciaDeRecepcion($zipresponse)
                ->setExito(true)
                ->setRespuestaCDR('')
                ->setEstado($estado);

          /*   $result->setConstanciaDeRecepcion($params['fileName']);
            $result->setExito(true); */
            return $result;
        }
       
        catch(SoapFault $soapfault){

            $ejec=new Sunat;
            $result->setExito(false);
            $error=new Error;
            $error=$ejec->getErrorFromFault($soapfault);
            //var_dump($error);
            $result->setError($error);
            //var_dump($result);
            return $result;
            
            //var_dump($soapfault);
        }
        catch(Exception $ex){
            $error=new Error;
            $exmess=$ex->getMessage();
            $result->setExito(false);
            $error->setCode('WSR1');
            //$error->setMessage($ex->getMessage());
            $error->setMessage(str_replace("'","",$exmess));
            $result->setError($error);
            return $result;

            //echo $soapfault->detail->message;
           
            //$result=new Error;
            

            //echo 'error';
            //var_dump($soapfault);
            /* echo "Request :<br>", htmlentities($client->__getLastRequest()), "<br>";
            echo "Response :<br>", htmlentities($client->__getLastResponse()), "<br>"; */
        }
    }

    public function ConsultarConstancia($request){
        $params = array(
            'rucComprobante' =>$request->getRuc(),
            'tipoComprobante' =>$request->getTipoDocumento(),
            'serieComprobante' =>$request->getSerie(),
            'numeroComprobante' =>$request->getNumero()
        );
        
        $result=new RespuestaSend;
        try{
            //set_error_handler(($this));
           /*  error_reporting(E_ALL);
            set_error_handler(array($this,'exception_error_handler'));  */
            
            error_reporting(E_ALL ^ E_WARNING);
            libxml_disable_entity_loader(true);

            $app=$this->client->__Soapcall('getStatusCdr', ['parameters' => $params]);
            /* $request=$this->client->__getLastRequest()."\n";
            $response=$this->client->__getLastResponse()."\n"; */
           //print_r($app);
            $zipresponse=$app->statusCdr->content;
            $estado=$app->statusCdr->statusCode;
            
            
            
            /* $CdrReader=new DomCdrReader(new XmlReader);
            $Extract= new Serializar;
            $xml=$Extract->GenerarRespuesta($zipresponse);
            $resultado2=$CdrReader->getCdrResponse($xml); */
            $result
                ->setConstanciaDeRecepcion($zipresponse)
                ->setExito(true)
                ->setRespuestaCDR('')
                ->setEstado($estado);
            return $result;
        }
       
        catch(SoapFault $soapfault){

            $ejec=new Sunat;
            $result->setExito(false);
            $error=new Error;
            $error=$ejec->getErrorFromFault($soapfault);
            $result->setError($error);
            
            return $result;
            
        }
        catch(Exception $ex){
            $exmess=$ex->getMessage();
            $error=new Error;
            $result->setExito(false);
            $error->setCode('WSC1');
            $error->setMessage(str_replace("'","",$exmess));
            $result->setError($error);
            return $result;
           
        }
    }
   
   
    
}
