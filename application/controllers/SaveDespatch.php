<?php

use chriskacerguis\RestServer\RestController;
use Process\Serialize;






defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';


require('Process\Serialize.php');

class SaveDespatch extends RestController
{
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->load->model('despatch/despatch_model');
        // $this->load->library('twig');
        

    }

    function index_post(string $companyId="1"){


        $datos = json_decode(file_get_contents("php://input"));
        $company = new Company_model();

        $doc = new Despatch_model();

        $datos->doc->company=$company->getCompanyStore($companyId);
        
        $datos->doc->destinatario->address = $company->getAddressQueryByCompanyId($companyId);

        $doc->set($datos->doc);

        $doc->insert();

        print_r($doc->envio);


      
        // print_r($datos);
        // print_r($company->getCompanyStore());
        // $company->setId($companyId);
  




        // print_r($datos);

    }
    
    
}
