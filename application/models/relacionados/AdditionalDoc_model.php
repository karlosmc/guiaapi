<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AdditionalDoc_model extends CI_Model
{

    /**
     * @var string
     */
    private $table = 'additionaldoc';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $tipoDesc;
    /**
     * @var string
     */
    public $tipo;
    /**
     * @var string
     */
    public $nro;
    /**
     * @var string
     */
    public $emisor;


#region getter and setter
    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tipoDesc
     *
     * @return  string
     */
    public function getTipoDesc()
    {
        return $this->tipoDesc;
    }

    /**
     * Set the value of tipoDesc
     *
     * @param  string  $tipoDesc
     *
     * @return  self
     */
    public function setTipoDesc(string $tipoDesc)
    {
        $this->tipoDesc = $tipoDesc;

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param  string  $tipo
     *
     * @return  self
     */
    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of nro
     *
     * @return  string
     */
    public function getNro()
    {
        return $this->nro;
    }

    /**
     * Set the value of nro
     *
     * @param  string  $nro
     *
     * @return  self
     */
    public function setNro(string $nro)
    {
        $this->nro = $nro;

        return $this;
    }

    /**
     * Get the value of emisor
     *
     * @return  string
     */
    public function getEmisor()
    {
        return $this->emisor;
    }

    /**
     * Set the value of emisor
     *
     * @param  string  $emisor
     *
     * @return  self
     */
    public function setEmisor(string $emisor)
    {
        $this->emisor = $emisor;

        return $this;
    }
#end getter and setter
}
