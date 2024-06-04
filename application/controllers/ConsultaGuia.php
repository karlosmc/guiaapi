<?php


//use Ejecucion\Serializar;
use chriskacerguis\RestServer\RestController;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


use Ejecucion\Serializar;
use Models\Responser\RespuestaConsultaGuia;

use ReaderResponse\DomCdrReader;
use ReaderResponse\XmlReader;
use SUNAT\GRE\Error\ErrorJson;


defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';

require('Ejecucion\Serializar.php');
require('Models\Responser\RespuestaConsultaGuia.php');
require('ErrorControl\ErrorJson.php');
include_once('ReaderResponse\DomCdrReader.php');
include_once('ReaderResponse\XmlReader.php');

include_once('Models\Responser\CdrResponse.php');

require APPPATH . '/libraries/ZipFile.php';




class ConsultaGuia extends RestController
{
    public function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
     
    }

    function index_post()
    {
        // $consult = $this->post("consult");
        
        $consult = json_decode(file_get_contents("php://input"),true);

        // print_r($consult);
        $token = $consult["access_token"];
        $EndPointUrl = $consult["EndPointUrl"];

        $client = new Client(['http_errors' => false]);
        $headers = [
            'Authorization' => "Bearer $token"
        ];

        //$urlNube="https://gre-test.nubefact.com/v1/contribuyente/gem/comprobantes/envios/$numTicket";
        
        $request = new Request('GET', $EndPointUrl, $headers);
        $res = $client->sendAsync($request)->wait();
        $statusCode=$res->getStatusCode();

        $respJson= json_decode($res->getBody());

        

        $RespuestaConsultaGuia= new RespuestaConsultaGuia();

        $RespuestaConsultaGuia->setStatus($statusCode);
        $RespuestaConsultaGuia->setExito(true);
        
        if($statusCode!==200){
            $ErrorJson= new ErrorJson();
            $ErrorJson->set($respJson);
            $RespuestaConsultaGuia->setErrorJson($ErrorJson);
            $RespuestaConsultaGuia->setExito(false);
        }

        $RespuestaConsultaGuia->set($respJson);

        if($RespuestaConsultaGuia->getIndCdrGenerado()==="1"){
            $CdrReader=new DomCdrReader(new XmlReader);
            $Extract= new Serializar;
            $xml=$Extract->GenerarRespuesta(base64_decode($RespuestaConsultaGuia->getArcCdr()));
            $result2=$CdrReader->getCdrResponse($xml);
            $RespuestaConsultaGuia->setCdrResponse($result2);
            //$this->response(array('response3' =>$result2, 200));
/*             $result
                ->setConstanciaDeRecepcion(base64_encode($resultado->getConstanciaDeRecepcion()))
                ->setExito(true)
                ->setRespuestaCDR($result2); */
        }else{
            $RespuestaConsultaGuia->setExito(false);
        }


        $this->response($RespuestaConsultaGuia, 200);
    }
}
