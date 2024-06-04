<?php

use chriskacerguis\RestServer\RestController;
use Process\Serialize;
use Shared\Data\SharedStore;


defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';
require('shared\SharedStore.php');
require('Process\Serialize.php');


class Test extends RestController
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('relacionados/additionaldoc_model');
        $this->load->model('transportista/Transportist_model');
        $this->load->model('transportista/Driver_model');
        $this->load->model('transportista/Vehicle_model');
        $this->load->model('shipment/Shipment_model');
        $this->load->model('shipment/Puerto_model');
        $this->load->model('shipment/Direction_model');
        $this->load->model('despatch/despatch_model');
        $this->load->model('despatch/despatchdetail_model');
        $this->load->model('client_model');
        $this->load->model('DetailAttribute_model');
        $this->load->library('twig');
    }

    public function index_get()
    {
        // echo 'hola';

        $certificado = file_get_contents("D:\CERTIFICADOS_2023\FAFIO\cert.pem");

        $base_64 = base64_encode($certificado);
        echo $base_64;

        // $sharedCompany = new SharedStore();

        // $company=$sharedCompany->getCompany();

        // $rel = new AdditionalDoc_model();
        // $rel->setTipoDesc('Factura')
        //     ->setTipo('01')
        //     ->setNro('F001-1')
        //     ->setEmisor($company->getRuc());

        
        // $transp = new Transportist_model();
        // $transp->setTipoDoc('6')
        //         ->setNumdoc('20519666601')
        //         ->setRznSocial('TRANSPORTES S.A.C.')
        //         ->setNroMtc('100015');

        // $conductor = (new Driver_model())
        // ->setTipo('Principal')
        // ->setTipoDoc('01')
        // ->setNroDoc('00453652')
        // ->setNombres('Juan')
        // ->setApellidos('Perez')
        // ->setLicencia('F454646456');

        // $vehiculo = (new Vehicle_model())
        // ->setPlaca('AAA111')
        // // ->setNroCirculacion('1111')
        // // ->setCodEmisor('43553308')
        // // ->setNroAutorizacion('45455')
        // // ->setSecundarios([(new Vehicle_model())
        // //                     ->setPlaca('B001212')
        // //                     ->setNroCirculacion('545646')
        // //                     ->setCodEmisor('55889963')
        // //                     ->setNroAutorizacion('4444')
        // //                 ])
        //                 ;
        
        // $envio = new Shipment_model();
        // $envio->setModTraslado('01')
        //     ->setCodTraslado('01')
        //     ->setDesTraslado('VENTA DE UX')
        //     ->setFecTraslado('2023-07-20 12:34:56')
        //     //->setChoferes([$conductor])
        //     ->setVehiculo($vehiculo)
        //     ->setPuerto((new Puerto_model())
        //                     ->setCodigo('01')
        //                     ->setNombre('Puerto 1'))
        //     ->setAeropuerto((new Puerto_model())
        //                     ->setCodigo('02')
        //                     ->setNombre('Aeropuerto 1'))
        //     ->setIndicadores(['SUNAT_Envio_IndicadorTrasladoVehiculoM1L'])
        //     ->setPesoTotal(12.5)
        //     ->setUndPesoTotal('KGM')
        //     //->setPesoItems(10.23)
        //     //->setSustentoPeso('Ninguna')
        //     ->setNumBultos(2)
        //     ->setContenedores(['0000001','0000002'])
        //     ->setLLegada((new Direction_model())
        //                 ->setUbigeo('150101')
        //                 ->setDireccion('AV. NICOLAS ARRIOLA 2291 LIMA')
        //                 ->setCodlocal('0001')
        //                 ->setRuc('20318171701'))
        //     ->setPartida((new Direction_model())
        //                 ->setUbigeo('150103')
        //                 ->setDireccion('AV. TOMAS MARSANO')
        //                 ->setCodlocal('0002')
        //                 ->setRuc('20519666601'))
        //     //->setTransportista($transp)
        //     ;

        

        // $despatch = new Despatch_model();
        // $despatch->setVersion('2023')
        //             ->setTipoDoc('09')
        //             ->setSerie('T001')
        //             ->setCorrelativo('122')
        //             ->setFechaEmision('2023-07-20 10:34:56')
        //             ->setCompany($company)
        //             ->setDestinatario((new Client_model())
        //                 ->setTipoDoc('6')
        //                 ->setNumDoc('20119207640')
        //                 ->setRznSocial('CLIENTE DE PRUEBA'))
        //             ->setComprador((new Client_model())
        //                 ->setTipoDoc('6')
        //                 ->setNumDoc('20318171701')
        //                 ->setRznSocial('CLIENTE DE PRUEBA 2'))
        //             ->setObservacion('NOTA GUIA')
        //             ->setAddDocs([$rel])
        //             ->setEnvio($envio);
        
        // $detail= new DespatchDetail_model();
        // $detail->setCantidad(2)
        //     ->setUnidad('ZZ')
        //     ->setDescripcion('PRODUCTO 1')
        //     ->setCodigo('PRO1')
        //     ->setCodProdSunat('15101505');
        
        // $detail2 = new DespatchDetail_model();
        // $detail2->setCantidad(0.1254646546)
        //             ->setDescripcion('PRODUCTO 2')
        //             ->setUnidad('NIU')
        //             ->setCodigo('PRO2')
        //             ->setCodProdSunat('15101505')
        //             ->setAtributos([
        //                 (new DetailAttribute_model())
        //                         ->setCode('01')
        //                         ->setName('Concepto')
        //                         ->setValue('TEST')
        //         ]);
        // $despatch->setDetails([$detail,$detail2]);

        // $serialize = new Serialize;
        // $resp=$serialize->GeneraXmlGuia($despatch);
            

        // $this->response(array('doc' => $despatch), 200);

    }


    public function index1_get()
    {
        // echo 'hola';
        die('hola');
    /* 
        $sharedCompany = new SharedStore();

        $company=$sharedCompany->getCompany();

        $rel = new AdditionalDoc_model();
        $rel->setTipoDesc('Factura')
            ->setTipo('01')
            ->setNro('F001-1')
            ->setEmisor($company->getRuc());

        
        $transp = new Transportist_model();
        $transp->setTipoDoc('6')
                ->setNumdoc('20519666601')
                ->setRznSocial('TRANSPORTES S.A.C.')
                ->setNroMtc('100015');

        $conductor = (new Driver_model())
        ->setTipo('Principal')
        ->setTipoDoc('01')
        ->setNroDoc('00453652')
        ->setNombres('Juan')
        ->setApellidos('Perez')
        ->setLicencia('F454646456');

        $vehiculo = (new Vehicle_model())
        ->setPlaca('AAA111')
        ->setNroCirculacion('1111')
        ->setCodEmisor('43553308')
        ->setNroAutorizacion('45455')
        ->setSecundarios([(new Vehicle_model())
                            ->setPlaca('B001212')
                            ->setNroCirculacion('545646')
                            ->setCodEmisor('55889963')
                            ->setNroAutorizacion('4444')
                        ]);
        
        $envio = new Shipment_model();
        $envio->setModTraslado('01')
            ->setCodTraslado('01')
            ->setDesTraslado('VENTA DE UX')
            ->setFecTraslado('2023-07-20 12:34:56')
            ->setChoferes([$conductor])
            ->setVehiculo($vehiculo)
            ->setPuerto((new Puerto_model())
                            ->setCodigo('01')
                            ->setNombre('Puerto 1'))
            ->setAeropuerto((new Puerto_model())
                            ->setCodigo('02')
                            ->setNombre('Aeropuerto 1'))
            ->setIndicadores(['SUNAT_Envio_IndicadorTrasladoVehiculoM1L'])
            ->setPesoTotal(12.5)
            ->setUndPesoTotal('KGM')
            ->setPesoItems(10.23)
            ->setSustentoPeso('Ninguna')
            ->setNumBultos(2)
            ->setContenedores(['0000001','0000002'])
            ->setLLegada((new Direction_model())
                        ->setUbigeo('150101')
                        ->setDireccion('AV. NICOLAS ARRIOLA 2291 LIMA')
                        ->setCodlocal('0001')
                        ->setRuc('20318171701'))
            ->setPartida((new Direction_model())
                        ->setUbigeo('150103')
                        ->setDireccion('AV. TOMAS MARSANO')
                        ->setCodlocal('0002')
                        ->setRuc('20519666601'))
            ->setTransportista($transp);

        

        $despatch = new Despatch_model();
        $despatch->setVersion('2023')
                    ->setTipoDoc('09')
                    ->setSerie('T001')
                    ->setCorrelativo('122')
                    ->setFechaEmision('2023-07-20 10:34:56')
                    ->setCompany($company)
                    ->setDestinatario((new Client_model())
                        ->setTipoDoc('6')
                        ->setNumDoc('20119207640')
                        ->setRznSocial('CLIENTE DE PRUEBA'))
                    ->setComprador((new Client_model())
                        ->setTipoDoc('6')
                        ->setNumDoc('20318171701')
                        ->setRznSocial('CLIENTE DE PRUEBA 2'))
                    ->setObservacion('NOTA GUIA')
                    ->setAddDocs([$rel])
                    ->setEnvio($envio);
        
        $detail= new DespatchDetail_model();
        $detail->setCantidad(2)
            ->setUnidad('ZZ')
            ->setDescripcion('PRODUCTO 1')
            ->setCodigo('PRO1')
            ->setCodProdSunat('P0001');
        
        $detail2 = new DespatchDetail_model();
        $detail2->setCantidad(0.1254646546546)
                    ->setDescripcion('PRODUCTO 2')
                    ->setCodigo('PRO2')
                    ->setCodProdSunat('P0002')
                    ->setAtributos([
                        (new DetailAttribute_model())
                                ->setCode('01')
                                ->setName('Concepto')
                                ->setValue('TEST')
                ]);
        $despatch->setDetails([$detail,$detail2]);
           

        $this->response(array('despatch' => $despatch), 200); */

        $sharedCompany = new SharedStore();

        $company=$sharedCompany->getCompany();

        $rel = new AdditionalDoc_model();
        $rel->setTipoDesc('Factura')
            ->setTipo('01')
            ->setNro('F001-1')
            ->setEmisor($company->getRuc());

        
        $transp = new Transportist_model();
        $transp->setTipoDoc('6')
                ->setNumdoc('20519666601')
                ->setRznSocial('TRANSPORTES S.A.C.')
                ->setNroMtc('100015');

        $conductor = (new Driver_model())
        ->setTipo('Principal')
        ->setTipoDoc('01')
        ->setNroDoc('00453652')
        ->setNombres('Juan')
        ->setApellidos('Perez')
        ->setLicencia('F454646456');

        $vehiculo = (new Vehicle_model())
        ->setPlaca('AAA111')
        ->setNroCirculacion('1111')
        ->setCodEmisor('43553308')
        ->setNroAutorizacion('45455')
        ->setSecundarios([(new Vehicle_model())
                            ->setPlaca('B001212')
                            ->setNroCirculacion('545646')
                            ->setCodEmisor('55889963')
                            ->setNroAutorizacion('4444')
                        ])
                        ;
        
        $envio = new Shipment_model();
        $envio->setModTraslado('01')
            ->setCodTraslado('01')
            ->setDesTraslado('VENTA DE UX')
            ->setFecTraslado('2023-07-20 12:34:56')
            ->setChoferes([$conductor])
            ->setVehiculo($vehiculo)
            ->setPuerto((new Puerto_model())
                            ->setCodigo('01')
                            ->setNombre('Puerto 1'))
            ->setAeropuerto((new Puerto_model())
                            ->setCodigo('02')
                            ->setNombre('Aeropuerto 1'))
            ->setIndicadores(['SUNAT_Envio_IndicadorTrasladoVehiculoM1L'])
            ->setPesoTotal(12.5)
            ->setUndPesoTotal('KGM')
            ->setPesoItems(10.23)
            ->setSustentoPeso('Ninguna')
            ->setNumBultos(2)
            ->setContenedores(['0000001','0000002'])
            ->setLLegada((new Direction_model())
                        ->setUbigeo('150101')
                        ->setDireccion('AV. NICOLAS ARRIOLA 2291 LIMA')
                        ->setCodlocal('0001')
                        ->setRuc('20318171701'))
            ->setPartida((new Direction_model())
                        ->setUbigeo('150103')
                        ->setDireccion('AV. TOMAS MARSANO')
                        ->setCodlocal('0002')
                        ->setRuc('20519666601'))
            // ->setTransportista(null)
            ;

        

        $despatch = new Despatch_model();
        $despatch->setVersion('2023')
                    ->setTipoDoc('09')
                    ->setSerie('T001')
                    ->setCorrelativo('122')
                    ->setFechaEmision('2023-07-20 10:34:56')
                    ->setCompany($company)
                    ->setDestinatario((new Client_model())
                        ->setTipoDoc('6')
                        ->setNumDoc('20119207640')
                        ->setRznSocial('CLIENTE DE PRUEBA'))
                    ->setComprador((new Client_model())
                        ->setTipoDoc('6')
                        ->setNumDoc('20318171701')
                        ->setRznSocial('CLIENTE DE PRUEBA 2'))
                    ->setObservacion('NOTA GUIA')
                    ->setAddDocs([$rel])
                    ->setEnvio($envio);
        
        $detail= new DespatchDetail_model();
        $detail->setCantidad(2)
            ->setUnidad('ZZ')
            ->setDescripcion('PRODUCTO 1')
            ->setCodigo('PRO1')
            ->setCodProdSunat('15101505');
        
        $detail2 = new DespatchDetail_model();
        $detail2->setCantidad(0.1254646546)
                    ->setDescripcion('PRODUCTO 2')
                    ->setUnidad('NIU')
                    ->setCodigo('PRO2')
                    ->setCodProdSunat('15101505')
                    ->setAtributos([
                        (new DetailAttribute_model())
                                ->setCode('01')
                                ->setName('Concepto')
                                ->setValue('TEST')
                ]);
        $despatch->setDetails([$detail,$detail2]);
           

        $this->response(array('doc' => $despatch), 200);
    }
}

        
    /* End of file  test.php */



    