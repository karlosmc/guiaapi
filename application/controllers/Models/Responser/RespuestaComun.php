<?php

namespace Models\Responser;

class RespuestaComun
{
    public $Exito;
    public $MensajeError;
    public $Pila;


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
    public function getMensajeError()
    {
        return $this->MensajeError;
    }

    /**
     * Set the value of MensajeError
     *
     * @return  self
     */ 
    public function setMensajeError($MensajeError)
    {
        $this->MensajeError = $MensajeError;

        return $this;
    }

    /**
     * Get the value of Pila
     */ 
    public function getPila()
    {
        return $this->Pila;
    }

    /**
     * Set the value of Pila
     *
     * @return  self
     */ 
    public function setPila($Pila)
    {
        $this->Pila = $Pila;

        return $this;
    }
}