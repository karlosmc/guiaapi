<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');
include_once './vendor/autoload.php';

class Client extends RestController {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('address_model');
        $this->load->model('clientaddress_model');
    }
    

    public function index2_get()
    {
    //     $cliente_model = new Client_model();

    //     $clientAddress_model = new Clientaddress_model();

    //     $cliente_model
    //     ->setId(0)
    //     ->setTipoDoc('1')
    //     ->setNumDoc('43553308')
    //     ->setRznSocial('Carlos Maquera')
    //     ->setEmail('carlos@email.com')
    //     ->setTelephone('987849773');

    //    /*  ->setAddress((new Address_model())
    //         ->setId(0)
    //         ->setUbigeo('230103')
    //         ->setCodigoPais('PE')
    //         ->setDepartamento('TACNA')
    //         ->setProvincia('tacna')
    //         ->setDistrito('tacna')
    //         ->setDireccion('en mi casa')
    //         ->setUrbanizacion('-')
    //         ->setCodLocal('0000')
    //     ); */

    //     $res = $cliente_model->newClienWithAddress();
        

    //     $clientAddress_model
    //     ->setClient($res['idclient'])
    //     ->setAddress($res['idaddress'])
    //     ->setIsMain(true)
    //     ->setOtherEmail('k4rlos.mc@gmail.com')
    //     ;

    //     $clientAddress_model->newClientAddress();


    }
    public function getAll_get(){
        $cliente_model = new Client_model();
        $result=$cliente_model->getAll();

        $this->response( [
            'status' => true,
            'result' => $result,
        ], 200 );
    }

    public function save_post()
    {
        $JSONData = file_get_contents("php://input");
        $datos = json_decode($JSONData);

        $cliente_model = new Client_model();
        $cliente_model->set($datos);

        $result = $cliente_model->newClient();

        $this->response( [
            'result' => $result,
        ], 200 );
    }

    public function index_get(string $numdoc = ""){

        $cliente_model = new Client_model();

        $result = $cliente_model->getClientIsMain($numdoc);

        $this->response( [
            'result' => $result,
        ], 200 );

    }
    
        
}
        
    /* End of file  Client.php */
        
                            