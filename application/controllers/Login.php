<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');
include_once './vendor/autoload.php';

class Login extends RestController {


  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }
  

    public function index_get()
    {
        echo 'entro aqui';
    }

    public function index_post()
    {
      $datos = json_decode(file_get_contents("php://input"));

      

      $user = new User_model();

      $userOn=$user->LogIn($datos->nrodoc,$datos->password,$datos->empresa,$datos->vehiculo);

      if($userOn===false){
        $this->response( [
            'status' => false,
            'message' => 'Usuario no identificado',
            'user'=>[]
        ], 200 );
    }else{
        $this->response( [
            'status' => true,
            'message' => 'Bienvenido',
            'user'=>$userOn,
        ], 200 );

}

    }
        
        
}