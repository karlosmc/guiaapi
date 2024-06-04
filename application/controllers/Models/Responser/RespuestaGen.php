<?php
namespace Models\Responser;
require('RespuestaComun.php');
class RespuestaGen extends RespuestaComun
{

    public $TramaXmlSinFirma;
    //public $RespuestaComun;


    /**
     * Get the value of TramaXmlSinFirma
     */ 
    public function getTramaXmlSinFirma()
    {
        return $this->TramaXmlSinFirma;
    }

    /**
     * Set the value of TramaXmlSinFirma
     *
     * @return  self
     */ 
    public function setTramaXmlSinFirma($TramaXmlSinFirma)
    {
        $this->TramaXmlSinFirma = $TramaXmlSinFirma;

        return $this;
    }

    
}