<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Driver_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'driver';
    /**
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $company;
    /**
     * @var string
     */
    public $tipo;
    /**
     * @var string
     */
    public $tipoDoc;
    /**
     * @var string
     */
    public $nroDoc;
    /**
     * @var string
     */
    public $nombres;
    /**
     * @var string
     */
    public $apellidos;
    /**
     * @var string
     */
    public $licencia;

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
     * Get the value of tipoDoc
     *
     * @return  string
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @param  string  $tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc(string $tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of nroDoc
     *
     * @return  string
     */ 
    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    /**
     * Set the value of nroDoc
     *
     * @param  string  $nroDoc
     *
     * @return  self
     */ 
    public function setNroDoc(string $nroDoc)
    {
        $this->nroDoc = $nroDoc;

        return $this;
    }

    /**
     * Get the value of nombres
     *
     * @return  string
     */ 
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set the value of nombres
     *
     * @param  string  $nombres
     *
     * @return  self
     */ 
    public function setNombres(string $nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get the value of apellidos
     *
     * @return  string
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @param  string  $apellidos
     *
     * @return  self
     */ 
    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of licencia
     *
     * @return  string
     */ 
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * Set the value of licencia
     *
     * @param  string  $licencia
     *
     * @return  self
     */ 
    public function setLicencia(string $licencia)
    {
        $this->licencia = $licencia;

        return $this;
    }

    public function getDriverByNroDoc(string $nrodoc){

        $res = $this->db->get_where($this->table,array('nrodoc'=>$nrodoc));

        return ($res->result()?$res->row():null);
        
    }

    /**
     * Get the value of company
     *
     * @return  int
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  int  $company
     *
     * @return  self
     */ 
    public function setCompany(int $company)
    {
        $this->company = $company;

        return $this;
    }
}
