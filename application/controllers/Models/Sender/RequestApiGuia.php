<?php

namespace Models\Sender\GRE;

class RequestApiGuia
{
    /**
     *
     * @var string
     */
    public $nomArchivo;
    /**
     *
     * @var string
     */
    public $arcGreZip;
    /**
     *
     * @var string
     */
    public $hashZip;

    /**
     * Get the value of nomArchivo
     *
     * @return  string
     */ 
    public function getNomArchivo()
    {
        return $this->nomArchivo;
    }

    /**
     * Set the value of nomArchivo
     *
     * @param  string  $nomArchivo
     *
     * @return  self
     */ 
    public function setNomArchivo(string $nomArchivo)
    {
        $this->nomArchivo = $nomArchivo;

        return $this;
    }

    /**
     * Get the value of arcGreZip
     *
     * @return  string
     */ 
    public function getArcGreZip()
    {
        return $this->arcGreZip;
    }

    /**
     * Set the value of arcGreZip
     *
     * @param  string  $arcGreZip
     *
     * @return  self
     */ 
    public function setArcGreZip(string $arcGreZip)
    {
        $this->arcGreZip = $arcGreZip;

        return $this;
    }

    /**
     * Get the value of hashZip
     *
     * @return  string
     */ 
    public function getHashZip()
    {
        return $this->hashZip;
    }

    /**
     * Set the value of hashZip
     *
     * @param  string  $hashZip
     *
     * @return  self
     */ 
    public function setHashZip(string $hashZip)
    {
        $this->hashZip = $hashZip;

        return $this;
    }
}
