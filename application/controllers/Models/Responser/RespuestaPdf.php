<?php
namespace Models\Responser;
/* require('RespuestaComun.php'); */
class RespuestaPdf extends RespuestaComun
{

    public $TramaPdf;
    //public $RespuestaComun;


    /**
     * Get the value of TramaXmlSinFirma
     */ 
    public function getTramaPdf()
    {
        return $this->TramaPdf;
    }

    /**
     * Set the value of TramaXmlSinFirma
     *
     * @return  self
     */ 
    public function setTramaPdf($TramaPdf)
    {
        $this->TramaPdf = $TramaPdf;

        return $this;
    }

    
}