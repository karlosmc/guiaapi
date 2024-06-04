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
use Models\Sender\GRE\RequestToken;

defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';

require('Ejecucion\Serializar.php');
/*require('Ejecucion\Certificar.php'); */
require('Models\Sender\RequestToken.php');

//require APPPATH . '/libraries/ZipFile.php';




class GetToken extends RestController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('token/token_model');
    $this->load->model('params/sunatparams_model');
    date_default_timezone_set('America/Lima');
  }
  function index_get()
  {
    $client = new Client();
    $headers = [
      'Content-Type' => 'application/x-www-form-urlencoded'
    ];
    /*         $options = [
        'form_params' => [
          'client_id' => 'test-85e5b0ae-255c-4891-a595-0b98c65c9854',
          'client_secret' => 'test-Hty/M6QshYvPgItX2P0+Kw==',
          'username' => '20519666601MODDATOS',
          'password' => 'MODDATOS',
          'grant_type' => 'password',
          'scope' => 'https://api-cpe.sunat.gob.pe'
        ]];
        $request = new Request('POST', 'https://gre-test.nubefact.com/v1/clientessol/test-85e5b0ae-255c-4891-a595-0b98c65c9854/oauth2/token', $headers); */

    $client_id = 'b5415a7d-41f2-4a17-9b8b-570d662e4235';



    //$url="https://gre-test.nubefact.com/v1/clientessol/$client_id/oauth2/token";
    $url = "https://api-seguridad.sunat.gob.pe/v1/clientessol/$client_id/oauth2/token/";
    $options = [
      'form_params' => [
        'client_id' => $client_id,
        'client_secret' => 'fA3jIc6y922cLzPyRJfb4Q==',
        'username' => '20119207640KLWEEQGU',
        'password' => 'Cente7640',
        'grant_type' => 'password',
        'scope' => 'https://api-cpe.sunat.gob.pe'
      ]
    ];
    $request = new Request('POST', $url, $headers);
    $res = $client->sendAsync($request, $options)->wait();


    $this->response(json_decode($res->getBody()), 200);

    /*         $file = "D:\CERTIFICADOS_2022\CENTENARIO\centenario.pem";
        $fileBytes = file_get_contents($file);
        $filebase64 = base64_encode($fileBytes);

        echo $filebase64; */
  }

  function index_post()
  {
    //print_r($datos);
    // $request = $this->post('RequestToken');

    $JSONData = file_get_contents("php://input");
    $request = json_decode($JSONData);

    $token_model = new Token_model();

    $response = $token_model->getTokenBD();

    //die();

    $requestToken = new RequestToken();

    $requestToken->setClient_id($request->client_id)
      ->setUsername($request->username)
      ->setPassword($request->password)
      ->setEndPointUrl($request->endPointUrl)
      ->setGrant_type($request->grant_type)
      ->setClient_secret($request->client_secret)
      ->setScope($request->scope);

    $client = new Client();
    $headers = [
      'Content-Type' => 'application/x-www-form-urlencoded'
    ];

    $url = $requestToken->getEndPointUrl('client_id');

    $options = [
      'form_params' => $requestToken
    ];

    $request = new Request('POST', $url, $headers);
    $res = $client->sendAsync($request, $options)->wait();

    $resNewToken = json_decode($res->getBody());

    $date = date('Y-m-d H:i:s ', time());
    $newDate = date("Y-m-d H:i:s", strtotime("+3600 sec"));

    $token_model->setCompany(1)
      ->setAccess_token($resNewToken->access_token)
      ->setToken_type($resNewToken->token_type)
      ->setExpires_in(3600)
      ->setCreated_at($date)
      ->setExpires_at($newDate);

    if ($response) {
      $token_model->refreshToken($response->getId());
    } else {
      $token_model->insertToken();
    }

    $response2 = $token_model->getTokenBD();

    $this->response($response2, 200);
  }

  function Token_get(string $idempresa)
  {

    $token_model = new Token_model();
    // $interval = $origin->diff($target);
    $sunatparams = new SunatParams_model();

    $responseSunat = $sunatparams->getSunatParams('desarrollo', $idempresa);
    // $this->response($responseSunat, 200);

    $requestToken = new RequestToken();

    $requestToken->setClient_id($responseSunat->client_id)
      ->setUsername($responseSunat->username)
      ->setPassword($responseSunat->password)
      ->setEndPointUrl($responseSunat->endpointurl)
      ->setGrant_type($responseSunat->grant_type)
      ->setClient_secret($responseSunat->client_secret)
      ->setScope($responseSunat->scope);

      // print_r($requestToken);

   
      $url = $requestToken->getEndPointUrl('client_id');

      $resNewToken = $this->getTokenOfProvider($url, $requestToken);

      // print_r($resNewToken);

      // $date = date('Y-m-d H:i:s ', time());
      // $newDate = date("Y-m-d H:i:s", strtotime("+3600 sec"));



    //   $token_model->setCompany($idempresa)
    //     ->setAccess_token($resNewToken->access_token)
    //     ->setToken_type($resNewToken->token_type)
    //     ->setExpires_in(3600)
    //     ->setCreated_at($date)
    //     ->setExpires_at($newDate);
    //   // $token_model->refreshToken($actualToken->getId());
    //   // $token_model->insertToken();
    // }
    // $response2 = $token_model->getTokenByIdCompany($idempresa);

    


    $this->response($resNewToken, 200);
  }



  function newToken_get(string $idempresa)
  {

    $token_model = new Token_model();
    $actualToken = $token_model->getTokenByIdCompany($idempresa);

    // $interval = $origin->diff($target);
    $sunatparams = new SunatParams_model();

    $responseSunat = $sunatparams->getSunatParams('produccion', $idempresa);
    // $this->response($responseSunat, 200);

    $requestToken = new RequestToken();

    $requestToken->setClient_id($responseSunat->client_id)
      ->setUsername($responseSunat->username)
      ->setPassword($responseSunat->password)
      ->setEndPointUrl($responseSunat->endpointurl)
      ->setGrant_type($responseSunat->grant_type)
      ->setClient_secret($responseSunat->client_secret)
      ->setScope($responseSunat->scope);

      // print_r($requestToken);

    if ($actualToken) {
      $expire_date = $actualToken->expires_at;
      $expire = new DateTime($expire_date);
      $current = new DateTime();
      if ($current > $expire) {

        $url = $requestToken->getEndPointUrl('client_id');

        $resNewToken = $this->getTokenOfProvider($url, $requestToken);

        $date = date('Y-m-d H:i:s ', time());
        $newDate = date("Y-m-d H:i:s", strtotime("+3600 sec"));

        $token_model->setCompany($idempresa)
          ->setAccess_token($resNewToken->access_token)
          ->setToken_type($resNewToken->token_type)
          ->setExpires_in(3600)
          ->setCreated_at($date)
          ->setExpires_at($newDate);
        $token_model->refreshToken($actualToken->getId());
      }
    } else {

      $url = $requestToken->getEndPointUrl('client_id');

      $resNewToken = $this->getTokenOfProvider($url, $requestToken);

      // print_r($resNewToken);

      $date = date('Y-m-d H:i:s ', time());
      $newDate = date("Y-m-d H:i:s", strtotime("+3600 sec"));

      $token_model->setCompany($idempresa)
        ->setAccess_token($resNewToken->access_token)
        ->setToken_type($resNewToken->token_type)
        ->setExpires_in(3600)
        ->setCreated_at($date)
        ->setExpires_at($newDate);
      // $token_model->refreshToken($actualToken->getId());
      $token_model->insertToken();
    }
    $response2 = $token_model->getTokenByIdCompany($idempresa);

    $response2->sunatParams=$responseSunat;

    $this->response($response2, 200);
  }

  function getSunatParams_get(){
    $sunatparams = new SunatParams_model();
    $responseSunat = $sunatparams->getSunatParams('desarrollo', '1');
    $this->response($responseSunat, 200);
  }

  function getTokenOfProvider(string $url, RequestToken $requestToken)
  {

    $client = new Client();
    $headers = [
      'Content-Type' => 'application/x-www-form-urlencoded'
    ];

    $options = [
      'form_params' => $requestToken
    ];

    $request = new Request('POST', $url, $headers);
    $res = $client->sendAsync($request, $options)->wait();

    return  json_decode($res->getBody());
  }
}
