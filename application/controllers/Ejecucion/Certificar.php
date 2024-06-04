<?php
namespace Ejecucion;

use Exception;
use DsigXml\Sunat\SignedXml;
use Models\Responser\RespuestaSign;
use ReaderResponse\XmlUtils;

require APPPATH . '/controllers/DsigXml/Sunat/SignedXml.php';
require APPPATH . '/controllers/ReaderResponse/XmlUtils.php';
require APPPATH . '/controllers/Models/Responser/RespuestaSign.php';

class Certificar {

    public function FirmarXml($request){
        
        $response=new RespuestaSign();
            try{
                $xmlTool = new SignedXml();
                // $xmlTool->setCertificateFromFile($request->getCertificadoDigital());
                $xmlTool->setCertificateFromByte(base64_decode($request->getCertificadoDigital()));
                $xml=$xmlTool->signXml($request->getTramaXmlSinFirma());
                $response->setTramaXmlFirmado($xml);

                file_put_contents("GUia.xml",$xml);

                $Util= new XmlUtils;
                $response->setResumenFirma($Util->getHashSign($xml));
                $response->setExito(true);
                return $response;
            }
            catch (Exception $ex){
                $response->setexito(false)
                         ->setMensajeError($ex)
                         ->setPila($ex);
                return $response;
            }
    }
}