<?php
namespace Models\Responser;

require('RespuestaComun.php');


class RespuestaSign extends RespuestaComun
{

    public $TramaXmlFirmado;
    public $ResumenFirma;


    /**
     * Get the value of TramaXmlFirmado
     */ 
    public function getTramaXmlFirmado()
    {
        return $this->TramaXmlFirmado;
    }

    /**
     * Set the value of TramaXmlFirmado
     *
     * @return  self
     */ 
    public function setTramaXmlFirmado($TramaXmlFirmado)
    {
        $this->TramaXmlFirmado = $TramaXmlFirmado;

        return $this;
    }

    /**
     * Get the value of ResumenFirma
     */ 
    public function getResumenFirma()
    {
        return $this->ResumenFirma;
    }

    /**
     * Set the value of ResumenFirma
     *
     * @return  self
     */ 
    public function setResumenFirma($ResumenFirma)
    {
        $this->ResumenFirma = $ResumenFirma;

        return $this;
    }
}