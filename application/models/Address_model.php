<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Address_model extends CI_Model {

    /**
     * @var string
     */
    private $table='address';

    /**
     * @var int
    */
    public $id;

     /**
     * @var string
    */
    public $ubigeo;

     /**
     * @var string
    */
    public $codigoPais;

     /**
     * @var string
    */
    public $departamento;

     /**
     * @var string
    */
    public $provincia;

     /**
     * @var string
    */
    public $distrito;
    /**
     * @var string
    */
    public $urbanizacion;

    /**
     * @var string
    */
    public $direccion;
     /**
     * @var string
    */
    public $codLocal;
     


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
     * Get the value of ubigeo
     *
     * @return  string
     */ 
    public function getUbigeo()
    {
        return $this->ubigeo;
    }

    /**
     * Set the value of ubigeo
     *
     * @param  string  $ubigeo
     *
     * @return  self
     */ 
    public function setUbigeo(string $ubigeo)
    {
        $this->ubigeo = $ubigeo;

        return $this;
    }

    /**
     * Get the value of codigoPais
     *
     * @return  string
     */ 
    public function getCodigoPais()
    {
        return $this->codigoPais;
    }

    /**
     * Set the value of codigoPais
     *
     * @param  string  $codigoPais
     *
     * @return  self
     */ 
    public function setCodigoPais(string $codigoPais)
    {
        $this->codigoPais = $codigoPais;

        return $this;
    }

    /**
     * Get the value of departamento
     *
     * @return  string
     */ 
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of departamento
     *
     * @param  string  $departamento
     *
     * @return  self
     */ 
    public function setDepartamento(string $departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of provincia
     *
     * @return  string
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @param  string  $provincia
     *
     * @return  self
     */ 
    public function setProvincia(string $provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get the value of distrito
     *
     * @return  string
     */ 
    public function getDistrito()
    {
        return $this->distrito;
    }

    /**
     * Set the value of distrito
     *
     * @param  string  $distrito
     *
     * @return  self
     */ 
    public function setDistrito(string $distrito)
    {
        $this->distrito = $distrito;

        return $this;
    }

    /**
     * Get the value of codLocal
     *
     * @return  string
     */ 
    public function getCodLocal()
    {
        return $this->codLocal;
    }

    /**
     * Set the value of codLocal
     *
     * @param  string  $codLocal
     *
     * @return  self
     */ 
    public function setCodLocal(string $codLocal)
    {
        $this->codLocal = $codLocal;

        return $this;
    }



    /**
     * Get the value of urbanizacion
     *
     * @return  string
     */ 
    public function getUrbanizacion()
    {
        return $this->urbanizacion;
    }

    /**
     * Set the value of urbanizacion
     *
     * @param  string  $urbanizacion
     *
     * @return  self
     */ 
    public function setUrbanizacion(string $urbanizacion)
    {
        $this->urbanizacion = $urbanizacion;

        return $this;
    }

    /**
     * Get the value of direccion
     *
     * @return  string
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @param  string  $direccion
     *
     * @return  self
     */ 
    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

     /**
     * Get the value of Address Class
     *
     * @return  Address_model
     */ 
    public function getAddress(int $id){
        $address = $this->db->get($this->table,array('id'=>$id));
        return $address->result(get_class($this))[0];
    }
}
