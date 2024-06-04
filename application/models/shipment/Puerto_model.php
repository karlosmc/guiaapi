<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Puerto_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'puerto';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $codigo;
    /**
     * @var string
     */
    public $nombre;

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
     * Get the value of codigo
     *
     * @return  string
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @param  string  $codigo
     *
     * @return  self
     */ 
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}