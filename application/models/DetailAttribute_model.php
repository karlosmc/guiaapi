<?php


defined('BASEPATH') or exit('No direct script access allowed');

class DetailAttribute_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'detailattribute';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $code;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $value;
    /**
     * @var DateTime
     */
    public $fecInicio;
    /**
     * @var DateTime
     */
    public $fecFin;

    /**
     * @var int
     */
    public $duracion;

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
     * Get the value of code
     *
     * @return  string
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string  $code
     *
     * @return  self
     */ 
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of value
     *
     * @return  string
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @param  string  $value
     *
     * @return  self
     */ 
    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of fecInicio
     *
     * @return  DateTime
     */ 
    public function getFecInicio()
    {
        return $this->fecInicio;
    }

    /**
     * Set the value of fecInicio
     *
     * @param  DateTime  $fecInicio
     *
     * @return  self
     */ 
    public function setFecInicio(DateTime $fecInicio)
    {
        $this->fecInicio = $fecInicio;

        return $this;
    }

    /**
     * Get the value of fecFin
     *
     * @return  DateTime
     */ 
    public function getFecFin()
    {
        return $this->fecFin;
    }

    /**
     * Set the value of fecFin
     *
     * @param  DateTime  $fecFin
     *
     * @return  self
     */ 
    public function setFecFin(DateTime $fecFin)
    {
        $this->fecFin = $fecFin;

        return $this;
    }

    /**
     * Get the value of duracion
     *
     * @return  int
     */ 
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     *
     * @param  int  $duracion
     *
     * @return  self
     */ 
    public function setDuracion(int $duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }
}
