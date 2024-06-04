<?php


defined('BASEPATH') or exit('No direct script access allowed');

class DespatchDetail_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'despatchdetail';
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
    public $descripcion;
    /**
     * @var string
     */
    public $unidad;
    /**
     * @var float
     */
    public $cantidad;
    /**
     * @var string
     */
    public $codProdSunat;

    /**
     * @var DetailAttribute_model[]
     */
    public $atributos;


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
     * Get the value of descripcion
     *
     * @return  string
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @param  string  $descripcion
     *
     * @return  self
     */ 
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of unidad
     *
     * @return  string
     */ 
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set the value of unidad
     *
     * @param  string  $unidad
     *
     * @return  self
     */ 
    public function setUnidad(string $unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get the value of cantidad
     *
     * @return  float
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @param  float  $cantidad
     *
     * @return  self
     */ 
    public function setCantidad(float $cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of codProdSunat
     *
     * @return  string
     */ 
    public function getCodProdSunat()
    {
        return $this->codProdSunat;
    }

    /**
     * Set the value of codProdSunat
     *
     * @param  string  $codProdSunat
     *
     * @return  self
     */ 
    public function setCodProdSunat(string $codProdSunat)
    {
        $this->codProdSunat = $codProdSunat;

        return $this;
    }

  

    /**
     * Get the value of atributos
     *
     * @return  DetailAttribute_model[]
     */ 
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * Set the value of atributos
     *
     * @param  DetailAttribute_model[]  $atributos
     *
     * @return  self
     */ 
    public function setAtributos(array $atributos)
    {
        $this->atributos = $atributos;

        return $this;
    }
}