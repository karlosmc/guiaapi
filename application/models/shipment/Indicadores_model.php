<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Indicadores_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'indicadores';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $indicador;

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
     * Get the value of indicador
     *
     * @return  string
     */ 
    public function getIndicador()
    {
        return $this->indicador;
    }

    /**
     * Set the value of indicador
     *
     * @param  string  $indicador
     *
     * @return  self
     */ 
    public function setIndicador(string $indicador)
    {
        $this->indicador = $indicador;

        return $this;
    }
}