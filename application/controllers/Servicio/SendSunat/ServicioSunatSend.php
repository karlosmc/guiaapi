<?php
namespace Servicio\SendSunat;

use Ejecucion\Serializar;
use Servicio\SoapConf\SoapSend;

require APPPATH . '/controllers/Servicio/SoapConf/SoapSend.php';



/* require('C:\xampp\htdocs\apifebeta\application\helpers\Soap\CustomHeaders_helper.php');
require('C:\xampp\htdocs\apifebeta\application\helpers\Soap\SoapClientDebug_helper.php'); */

class ServicioSunatSend{

    public  $request;
    private $SoapService;
    public $TramaZip;
    public $NombreArchivo;

    public function __construct()
    {
        //parent::__construct();
        
        /* $this->SoapService=new SoapSend;
        $this->Iniciar(); */
        //$this->request=$request;
    }

    public function Iniciar(){
        //var_dump($this->request);
        $this->SoapService=new SoapSend;
        
        $respuesta=$this->SoapService->SetSoap($this->request);
        
        $this->NombreArchivo=$this->request->getNombreArchivo();
        
        return $respuesta;
    }

    public function SendDocument(){
        $GenZip=new Serializar;
        $this->TramaZip=$GenZip->GenerarZIP($this->request,'');
        return  $this->SoapService->SendBills($this->TramaZip,$this->NombreArchivo);
    }

    public function SendResumen(){
        $GenZip=new Serializar;
        $this->TramaZip=$GenZip->GenerarZIP($this->request,'');
        return  $this->SoapService->sendSummary($this->NombreArchivo,$this->TramaZip);
    }

    /**
     * Get the value of TramaZip
     */ 
    public function getTramaZip()
    {
        return $this->TramaZip;
    }

    /**
     * Set the value of TramaZip
     *
     * @return  self
     */ 
    public function setTramaZip($TramaZip)
    {
        $this->TramaZip = $TramaZip;

        return $this;
    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */ 
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }
}