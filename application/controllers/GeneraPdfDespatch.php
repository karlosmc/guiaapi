<?php

use chriskacerguis\RestServer\RestController;
use Process\Serialize;






defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';


require('Process\Serialize.php');

class GeneraPdfDespatch extends RestController
{
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->load->model('client_model');
        $this->load->library('twig');
        

    }
    
    
    function index_get(){

      
      $file = 'D:\CERTIFICADOS_2022\CENTENARIO\centenario.pem';

      $file2 = file_get_contents($file);

      $file_base64 = base64_encode($file2);
      print_r($file_base64);


      die();

      $doc = [
        "doc" => [
              "id" => null, 
              "version" => "2023", 
              "tipoDoc" => "09", 
              "serie" => "TZ01", 
              "correlativo" => "1", 
              "observacion" => "NOTA GUIA", 
              "fechaEmision" => "2023-07-19",
              "company" => [
                    "id" => "1", 
                    "ruc" => "20519666601", 
                    "razonSocial" => "ESTACION DE ENERGIAS EL CENTENARIO S.A.C.", 
                    "nombreComercial" => "ENERGIAS EL CENTENARIO S.A.C.", 
                    "email" => "contabilidad@elcenteario.com.pe", 
                    "telephone" => "52978987", 
                    "Address" => [
                       "id" => "1", 
                       "ubigeo" => "230103", 
                       "codigoPais" => "PE", 
                       "departamento" => "TACNA", 
                       "provincia" => "TACNA", 
                       "distrito" => "TACNA", 
                       "urbanizacion" => "-", 
                       "direccion" => "AV.  INDUSTRIAL NRO 260", 
                       "codLocal" => "0000", 
                       "created_at" => "2023-04-26 15:59:06" 
                    ], 
                    "created_at" => "2023-05-29 16:44:23" 
                 ], 
              "destinatario" => [
                          "id" => null, 
                          "tipoDoc" => "6", 
                          "numDoc" => "20119207640", 
                          "rznSocial" => "AGROPECUARIA E INDUSTRIAS FAFIO S.A.", 
                          "email" => null, 
                          "telephone" => null 
                       ], 
              "tercero" => null, 
             //  "comprador" => [
             //                 "id" => null, 
             //                 "tipoDoc" => "6", 
             //                 "numDoc" => "20519666601", 
             //                 "rznSocial" => "CLIENTE DE PRUEBA 2", 
             //                 "email" => null, 
             //                 "telephone" => null 
             //              ], 
              "envio" => [
                                "id" => null, 
                                "codTraslado" => "01", 
                                "desTraslado" => "VENTA DE UX", 
                                "indTransbordo" => null, 
                                "indicadores" => [
                                     "SUNAT_Envio_IndicadorTrasladoVehiculoM1L" 
                                ], 
                                "pesoTotal" => 10.230,
                                "undPesoTotal" => "KGM", 
                                "numBultos" => 2, 
                                "contenedores" => 
                                         [
                                           "0000001",
                                            "0000002" 
                                            ] 
                                      , 
                             
                                "modTraslado" => "01", 
                                "fecTraslado" => "2023-07-20",
                                "puerto" => [
                                                           "id" => null, 
                                                           "codigo" => "01", 
                                                           "nombre" => "Puerto 1" 
                                                        ], 
                                "aeropuerto" => [
                                                              "id" => null, 
                                                              "codigo" => "02", 
                                                              "nombre" => "Aeropuerto 1" 
                                                           ], 
                               //  "transportista" => [
                               //                                   "id" => null, 
                               //                                   "tipoDoc" => "6", 
                               //                                   "numDoc" => "20519666601", 
                               //                                   "rznSocial" => "TRANSPORTES S.A.C.", 
                               //                                   "nroMtc" => "100015" 
                               //                                ], 
                                "vehiculo" => [
                                                                    "id" => null, 
                                                                    "placa" => "AAA111",
                                                                   //  "nroCirculacion" => "1111", 
                                                                   //  "codEmisor" => "43553308", 
                                                                   //  "nroAutorizacion" => "45455", 
                                                                   //  "secundarios" => [
                                                                   //     [
                                                                   //        "id" => null, 
                                                                   //        "placa" => "B0A1212", 
                                                                   //        "nroCirculacion" => "545646", 
                                                                   //        "codEmisor" => "55889963", 
                                                                   //        "nroAutorizacion" => "4444", 
                                                                   //        "secundarios" => null 
                                                                   //     ] 
                                                                   //  ] 
                                                                 ], 
                                "llegada" => [
                                                                             "id" => null, 
                                                                             "ubigeo" => "150101", 
                                                                             "direccion" => "AV. NICOLAS ARRIOLA 2291 LIMA", 
                                                                             "codlocal" => "0001", 
                                                                             "ruc" => "20318171701" 
                                                                          ], 
                                "partida" => [
                                                                                "id" => null, 
                                                                                "ubigeo" => "150103", 
                                                                                "direccion" => "AV. TOMAS MARSANO", 
                                                                                "codlocal" => "0002", 
                                                                                "ruc" => "20519666601" 
                                                                             ] 
                             ], 
              "addDocs" => [
                                                                                   [
                                                                                      "id" => null, 
                                                                                      "tipoDesc" => "Factura", 
                                                                                      "tipo" => "01", 
                                                                                      "nro" => "F001-1", 
                                                                                      "emisor" => "20519666601" 
                                                                                   ] 
                                                                                ], 
              "details" => [
                                                                                         [
                                                                                            "id" => null, 
                                                                                            "codigo" => "PRO1", 
                                                                                            "descripcion" => "PRODUCTO 1", 
                                                                                            "unidad" => "ZZ", 
                                                                                            "cantidad" => 2.0000000000, 
                                                                                            "codProdSunat" => "15101505", 
                                                                                            "atributos" => null 
                                                                                         ], 
                                                                                        
                                                                                      ] 
           ] 
     ]; 
      
     $serialize = new Serialize;
     $resp=$serialize->GeneraXmlGuia($doc);
     
     $this->response(array('response' => $resp), 200);

        

    }

    function index_post(string $companyId="1"){
      // $doc = $this->post('doc');

      $datos = json_decode(file_get_contents("php://input"),true);

      // $datos=json_decode(json_encode($datos));
      
      // $this->response($datos, 200);

      $company = new Company_model();

      $client = new Client_model();

      
      
      // print_r($company->getCompanyStore());
      // $company->setId($companyId);

      $datos['doc']['company'] = $company->getCompanyStore($companyId);

      // $datos['doc']['destinatario']['address'] = $client->getAddressQueryByClientId($companyId);

      // $datos['doc']['destinatario']['address'] = $client->getAddressQueryByNumDoc($companyId);

      

      
      // $company=$sharedCompany->getCompany();
      // print_r($company);
      
      $serialize = new Serialize;
      $resp=$serialize->GenerarPDF($datos);
      
      $this->response(array('response' => $resp), 200);
    }
}
