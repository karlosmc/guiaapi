<?php
namespace Ejecucion;

use Exception;
use Models\Responser\RespuestaGen;


use ZipFile;
use Twig;
use Ejecucion\cata\Cata;
use Models\Responser\RespuestaPdf;

//use Dompdf\Dompdf;
//use Knp\Snappy\Pdf;
//use Mpdf\HTMLParserMode;
//use Mpdf\Output\Destination;
//use TCPDF;

use mikehaertl\wkhtmlto\Pdf;
use QRgen;


include_once './vendor/autoload.php';

/* require APPPATH . '/libraries/ZipFile.php'; */

require APPPATH . '/controllers/Models/Responser/RespuestaGen.php';
require APPPATH . '/controllers/Models/Responser/RespuestaPdf.php';

require APPPATH . '/controllers/Ejecucion/Cata.php';
require 'QRgen.php';


class Serializar {

    public function GenerarXmlFactura($docE){
        $docE=$docE['Sale'];
        
        $Respuesta=new RespuestaGen();
        try{
            $Twig = new Twig();
            
            $Invoice=$Twig->render('invoice1.xml',array('doc'=>$docE));
            
            $Respuesta->setTramaXmlSinFirma($Invoice);
            $Respuesta->setExito(true);
            return $Respuesta;
            
        }
        catch (Exception $ex){
            $Respuesta->setexito(false)
                      ->setMensajeError($ex)
                      ->setPila($ex);
            return $Respuesta;
        }

    }

    public function GenerarXmlNota($docE){

        
        $Respuesta=new RespuestaGen();
        try{
            $Twig = new Twig();
            
            $Invoice=$Twig->render('notacr.xml',array('doc'=>$docE));
            
            $Respuesta->setTramaXmlSinFirma($Invoice);
            $Respuesta->setExito(true);
            return $Respuesta;
            
        }
        catch (Exception $ex){
            $Respuesta->setexito(false)
                      ->setMensajeError($ex)
                      ->setPila($ex);
            return $Respuesta;
        }

    }
    public function GenerarXmlResumen($resu){
        $Respuesta=new RespuestaGen();
        try{
            $Twig = new Twig();
            $res=$Twig->render('summary.xml',array('doc'=>$resu));
            $Respuesta->setTramaXmlSinFirma($res);
            $Respuesta->setExito(true);
            return $Respuesta;
            
        }
        catch (Exception $ex){
            $Respuesta->setexito(false)
                      ->setMensajeError($ex)
                      ->setPila($ex);
            return $Respuesta;
        }

    }

    public function GenerarXmlBaja($resu){
        $Respuesta=new RespuestaGen();
        
        try{
            $Twig = new Twig();
            $res=$Twig->render('voided.xml',array('doc'=>$resu));
            $Respuesta->setTramaXmlSinFirma($res);
            $Respuesta->setExito(true);
            return $Respuesta;           
        }

        catch (Exception $ex){
            $Respuesta->setexito(false)
                      ->setMensajeError($ex)
                      ->setPila($ex);
            return $Respuesta;
        }

    }

    public function GenerarPDF($docE){
        //return 'hola';
        /* $snappy = new KnpSnappyBundle;
        $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', 'E:/test.pdf'); */

        $docE=$docE['Sale'];
        
        $Respuesta=new RespuestaPdf;
        try{
            $logo=base64_encode(file_get_contents('D:\USO_APIFAFIO\LogoFafio.png'));///DEBE SER DINAMICO
            
            $Twig = new Twig();
            $cata=new Cata;
            $name=$cata->getValueCatalog($docE['TipoDocumento'],'TD'); 
            $tipodoc=$cata->getValueCatalog($docE['Receptor']['TipoDocumento'],'IDE'); 
            $tipoMoneda=$cata->getValueCatalog($docE['Moneda'],'MON'); 
            $mon=$cata->getValueCatalog($docE['Moneda'],'MOS'); 
            $docE['Name']=$name;
            $docE['Receptor']['tipoDoc']=$tipodoc;
            $docE['tipoMoneda']=$tipoMoneda;
            $docE['mon']=$mon;
            $docE['logo']="data:image/png;base64,".$logo;
            $qr=new QRgen();
            $qrimage=base64_encode($qr->getImage($docE));
            
            $docE['qrcode']="data:image/png;base64,".$qrimage;
            
            $Invoice=$Twig->render('invoice1.html',array('doc'=>$docE));
            
            $path = 'C:\xampp\htdocs\ApiRestFE\vendor\bin\wkhtmltopdf.exe';

            $pdf = new Pdf(array(
                'binary'=>$path,
                'no-outline',         // Make Chrome not complain
            ));

            $pdf->addPage($Invoice);

            $Respuesta->setTramaPdf(base64_encode($pdf->toString()));
            $Respuesta->setExito(true);
            return $Respuesta;          
        }
        catch (Exception $ex){
            $Respuesta->setMensajeError($ex);
           if ($pdf->getError()){
            $Respuesta->setMensajeError($pdf->getError());
           }
            $Respuesta->setexito(false);
            $Respuesta->setPila($ex);
            return $Respuesta;
        }
    }
   
    public function GenerarPDFNota($docE){
        //return 'hola';
        /* $snappy = new KnpSnappyBundle;
        $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', 'E:/test.pdf'); */
        
        
        $Respuesta=new RespuestaPdf;
        try{
            $logo=base64_encode(file_get_contents('D:\USO_APIFAFIO\LogoFafio.png'));
            
            $Twig = new Twig();
            $cata=new Cata;
            $name=$cata->getValueCatalog($docE['Sale']['TipoDocumento'],'TD'); 
            $tipodoc=$cata->getValueCatalog($docE['Sale']['Receptor']['TipoDocumento'],'IDE'); 
            $tipoMoneda=$cata->getValueCatalog($docE['Sale']['Moneda'],'MON'); 
            $mon=$cata->getValueCatalog($docE['Sale']['Moneda'],'MOS');
            $afectado=$cata->getValueCatalog($docE['TipoDocAfectado'],'TD');  

            $docE['Sale']['Name']=$name;
            $docE['Sale']['Afectado']=$afectado.' '.$docE['NumDocAfectado'];
            $docE['Sale']['Receptor']['tipoDoc']=$tipodoc;
            $docE['Sale']['tipoMoneda']=$tipoMoneda;
            $docE['Sale']['mon']=$mon;
            $docE['Sale']['logo']="data:image/png;base64,".$logo;
            $qr=new QRgen();
            $qrimage=base64_encode($qr->getImage1($docE));
            
            $docE['qrcode']="data:image/png;base64,".$qrimage;
            
            $Invoice=$Twig->render('nota.html',array('doc'=>$docE));
            
            $path = 'C:\xampp\htdocs\ApiRestFE\vendor\bin\wkhtmltopdf.exe';

            $pdf = new Pdf(array(
                'binary'=>$path,
                'no-outline',         // Make Chrome not complain
            ));

            $pdf->addPage($Invoice);

            $Respuesta->setTramaPdf(base64_encode($pdf->toString()));
            $Respuesta->setExito(true);
            return $Respuesta;          
        }
        catch (Exception $ex){
            $Respuesta->setMensajeError($ex);
           if ($pdf->getError()){
            $Respuesta->setMensajeError($pdf->getError());
           }
            $Respuesta->setexito(false);
            $Respuesta->setPila($ex);
            return $Respuesta;
        }
    }


    public function GenerarZip($nombrearchivo,$tramafirmada){
        $Zip= new ZipFile;
        $TramaByte=$tramafirmada;
        return $Zip->compress($nombrearchivo.'.xml',$TramaByte);
    }

    Public function GenerarRespuesta($content){
        return $this->getXmlResponse($content);
    }

    private function getXmlResponse($content)
        {
        $Zip=new ZipFile;
            $filter = function ($filename) {
                return 'xml' === strtolower($this->getFileExtension($filename));
            };
            $files = $Zip->decompress($content, $filter);
            return 0 === count($files) ? '' : $files[0]['content'];
        }
    private function getFileExtension($filename)
        {
            $lastDotPos = strrpos($filename, '.');
            if (!$lastDotPos) {
                return '';
            }
            return substr($filename, $lastDotPos + 1);
        }
   

}