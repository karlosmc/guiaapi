<?php
namespace Shared\Data;

defined('BASEPATH') OR exit('No direct script access allowed');

use CI_Controller;
use Company_model;


        
class SharedStore extends CI_Controller  {
     
   
   public function __construct()
   {
    parent::__construct();
    $this->load->model('company_model');
   }
   

     
      /**
     * @return Company_model
     */

    public function getCompany()
    {
        $company = new Company_model();

        return $company->getCompanyStore();
    }
}