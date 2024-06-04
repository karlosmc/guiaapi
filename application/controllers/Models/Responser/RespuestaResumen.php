<?php
namespace Models\Responser;

class RespuestaResumen
{

    public $NumeroTicket;
    public $Exito;
    public $Error;
    
    


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
     * Get the value of NumeroTicket
     */ 
    public function getNumeroTicket()
    {
        return $this->NumeroTicket;
    }

    /**
     * Set the value of NumeroTicket
     *
     * @return  self
     */ 
    public function setNumeroTicket($NumeroTicket)
    {
        $this->NumeroTicket = $NumeroTicket;

        return $this;
    }
}