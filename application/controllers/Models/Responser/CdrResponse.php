<?php

namespace Models\Response;

class CdrResponse
{

    public $Id;
    public $Codigo;
    public $Descripcion;
    public $Notas;

    public $hashQr;


    /**
     * Get the value of Id
     */ 
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */ 
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Get the value of Codigo
     */ 
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * Set the value of Codigo
     *
     * @return  self
     */ 
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;

        return $this;
    }

    /**
     * Get the value of Descripcion
     */ 
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * Set the value of Descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    /**
     * Get the value of Notas
     */ 
    public function getNotas()
    {
        return $this->Notas;
    }

    /**
     * Set the value of Notas
     *
     * @return  self
     */ 
    public function setNotas($Notas)
    {
        $this->Notas = $Notas;

        return $this;
    }

    /**
     * Get the value of hashQr
     */ 
    public function getHashQr()
    {
        return $this->hashQr;
    }

    /**
     * Set the value of hashQr
     *
     * @return  self
     */ 
    public function setHashQr($hashQr)
    {
        $this->hashQr = $hashQr;

        return $this;
    }
}