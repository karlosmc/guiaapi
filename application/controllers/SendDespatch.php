<?php


//use Ejecucion\Serializar;
use chriskacerguis\RestServer\RestController;
use Ejecucion\Serializar;
use Models\Sender\RequestSend;
use ReaderResponse\DomCdrReader;
use ReaderResponse\XmlReader;
//use Servicio\SendSunat\ServicioSunatSend;
use Servicio\SoapConf\SoapSend;
use Models\Responser\RespuestaSend;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Models\Responser\RespuestaJson;
use Models\Sender\GRE\RequestArchivo;
use SUNAT\GRE\Error\ErrorJson;

defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';

require('Ejecucion\Serializar.php');
require('Models\Sender\RequestSend.php');
require('Models\Sender\RequestArchivo.php');
require('Models\Responser\RespuestaJson.php');
require APPPATH . '/libraries/ZipFile.php';

require('ErrorControl\ErrorJson.php');




class SendDespatch extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
    }

    function index_get()
    {
    }

    function index_post(string $companyId = "1")
    {
        // $request = $this->post('request');

        $request = json_decode(file_get_contents("php://input"), true);

        // $request=$request['request'];

        $company = new Company_model();

        // print_r($datos);
        // print_r($company->getCompanyStore());

        $empresa = $company->getCompanyStore($companyId);
        // print_r($empresa);


        $requestsend = new RequestSend;
        $requestsend->setTramaXmlFirmado($request['TramaXmlFirmado']);
        $requestsend->setEndPointUrl($request['EndPointUrl']);

        $requestsend->setRuc($empresa->getRuc());
        $requestsend->setTipoDocumento($request['TipoDocumento']);
        $requestsend->setIdDocumento($request['IdDocumento']);
        $requestsend->setNombreArchivo($requestsend->getRuc() . '-' . $requestsend->getTipoDocumento() . '-' . $requestsend->getIdDocumento());

        $requestsend->setToken($request["token"]);

        // print_r($requestsend);

        // die();

        $zipfile = new Serializar;
        $tramazip = $zipfile->GenerarZip($requestsend->getNombreArchivo(), $requestsend->getTramaXmlFirmado());
        $arcGreZip = base64_encode($tramazip);
        $hashZip = hash('sha256', $tramazip);

        $requestArchivo = new RequestArchivo();
        $requestArchivo->setNomArchivo($requestsend->getNombreArchivo() . ".zip");
        $requestArchivo->setArcGreZip($arcGreZip);
        $requestArchivo->setHashZip($hashZip);

        $urlSunat = $requestsend->getEndPointUrl() . $requestsend->getNombreArchivo();

        // echo $urlSunat;

        // print_r($requestArchivo);


        $client = new Client(['http_errors' => false]);
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . $requestsend->getToken()

        ];

        // print_r($requestArchivo);

        //https://api-cpe.sunat.gob.pe/v1/contribuyente/gem/comprobantes/{numRucEmisor}-{codCpe}-{numSerie}-{numCpe}

        //$urlNube="https://gre-test.nubefact.com/v1/contribuyente/gem/comprobantes/$file";
        //"https://api-cpe.sunat.gob.pe/v1/contribuyente/gem/comprobantes/"




        $requestClient = new Request('POST', $urlSunat, $headers, json_encode(array("archivo" => $requestArchivo)));
        $res = $client->sendAsync($requestClient)->wait();
        $statusCode = $res->getStatusCode();

        // print_r($urlSunat);
        // print_r($requestArchivo);

        // print_r($headers);



        $respJson = json_decode($res->getBody());

        // print_r($statusCode);
        $RespuestaJson = new RespuestaJson();

        $RespuestaJson->setStatus($statusCode);
        $RespuestaJson->setExito(true);

        if ($statusCode !== 200) {
            $ErrorJson= new ErrorJson();
            $ErrorJson->set($respJson);
            $RespuestaJson->setErrorJson($ErrorJson);
            $RespuestaJson->setExito(false);
        }

        $RespuestaJson->set($respJson);

        $this->response($RespuestaJson, 200);
    }
}
