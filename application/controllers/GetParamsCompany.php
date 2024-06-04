<?php



use chriskacerguis\RestServer\RestController;




defined('BASEPATH') or exit('No direct script access allowed');

include_once './vendor/autoload.php';





class GetParamsCompany extends RestController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('params/sunatparams_model');
  }

  function index_get()
  {
    $sunatparams = new SunatParams_model();
    $response = $sunatparams->getSunatParams('desarrollo',1);
    $this->response(array('response' => $response), 200);
  }

  function index_post()
  {

  }
}
