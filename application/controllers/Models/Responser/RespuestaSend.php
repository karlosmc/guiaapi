<?php
namespace Models\Responser;

class RespuestaSend
{

    public $ConstanciaDeRecepcion;
    public $RespuestaCDR;
    public $Exito;
    public $Error;
    public $Estado;
    
    

    /**
     * Get the value of ConstanciaDeRecepcion
     */ 
    public function getConstanciaDeRecepcion()
    {
        return $this->ConstanciaDeRecepcion;
    }

    /**
     * Set the value of ConstanciaDeRecepcion
     *
     * @return  self
     */ 
    public function setConstanciaDeRecepcion($ConstanciaDeRecepcion)
    {
        $this->ConstanciaDeRecepcion = $ConstanciaDeRecepcion;

        return $this;
    }

    /**
     * Get the value of Exito
     */ 
    public function getExito()
    {
        return $this->Exito;
    }

    /**
     * Set the value of Exito
     *
     * @return  self
     */ 
    public function setExito($Exito)
    {
        $this->Exito = $Exito;

        return $this;
    }

    /**
     * Get the value of MensajeError
     */ 
    public function getError()
    {
        return $this->Error;
    }

    /**
     * Set the value of MensajeError
     *
     * @return  self
     */ 
    public function setError($Error)
    {
        $this->Error = $Error;

        return $this;
    }

    /**
     * Get the value of RespuestaCDR
     */ 
    public function getRespuestaCDR()
    {
        return $this->RespuestaCDR;
    }

    /**
     * Set the value of RespuestaCDR
     *
     * @return  self
     */ 
    public function setRespuestaCDR($RespuestaCDR)
    {
        $this->RespuestaCDR = $RespuestaCDR;

        return $this;
    }

    /**
     * Get the value of Estado
     */ 
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * Set the value of Estado
     *
     * @return  self
     */ 
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }
}