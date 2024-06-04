<?php

use chriskacerguis\RestServer\RestController;



defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';


require('Process\Serialize.php');

class Vehicles extends RestController
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('transportista/vehicle_model');
    
    // $this->load->library('twig');
    // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  }

  public function index_get(string $company){

    $vehicleModel = new Vehicle_model();
    $listVehicles = $vehicleModel->getVehiclesByCompany($company);

    $this->response(array('response' => $listVehicles), 200);

  }
}
