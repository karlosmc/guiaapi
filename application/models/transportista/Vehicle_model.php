<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Vehicle_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'vehicle';
    /**
     * @var string
     */
    private $tableDetails = 'companyvehicle';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $placa;
    /**
     * @var string
     */
    public $nroCirculacion;
    /**
     * @var string
     */
    public $codEmisor;
    /**
     * @var string
     */
    public $nroAutorizacion;
    /**
     * @var Vehicle_model[]
     */
    public $secundarios;

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
     * Get the value of placa
     *
     * @return  string
     */ 
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set the value of placa
     *
     * @param  string  $placa
     *
     * @return  self
     */ 
    public function setPlaca(string $placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get the value of nroCirculacion
     *
     * @return  string
     */ 
    public function getNroCirculacion()
    {
        return $this->nroCirculacion;
    }

    /**
     * Set the value of nroCirculacion
     *
     * @param  string  $nroCirculacion
     *
     * @return  self
     */ 
    public function setNroCirculacion(string $nroCirculacion)
    {
        $this->nroCirculacion = $nroCirculacion;

        return $this;
    }

    /**
     * Get the value of codEmisor
     *
     * @return  string
     */ 
    public function getCodEmisor()
    {
        return $this->codEmisor;
    }

    /**
     * Set the value of codEmisor
     *
     * @param  string  $codEmisor
     *
     * @return  self
     */ 
    public function setCodEmisor(string $codEmisor)
    {
        $this->codEmisor = $codEmisor;

        return $this;
    }

    /**
     * Get the value of nroAutorizacion
     *
     * @return  string
     */ 
    public function getNroAutorizacion():?string
    {
        return $this->nroAutorizacion;
    }

    /**
     * Set the value of nroAutorizacion
     *
     * @param  string|null  $nroAutorizacion
     *
     * @return  self
     */ 
    public function setNroAutorizacion(?string $nroAutorizacion)
    {
        $this->nroAutorizacion = $nroAutorizacion;

        return $this;
    }

    /**
     * Get the value of secundarios
     *
     * @return  Vehicle_model[]
     */ 
    public function getSecundarios():?array
    {
        return $this->secundarios;
    }

    /**
     * Set the value of secundarios
     *
     * @param  Vehicle_model[]  $secundarios
     *
     * @return  Vehicle_model
     */ 
    public function setSecundarios(?array $secundarios):Vehicle_model
    {
        $this->secundarios = $secundarios;

        return $this;
    }

    public function getVehiclesByCompany(string $company){

        $this->db->select('placa');
        $this->db->from('companyvehicle cv');
        $this->db->join('vehicle ve','cv.vehicle=ve.id');
        $this->db->where('cv.company',$company);

        $res = $this->db->get();


        // $res = $this->db->get_where($this->tableDetails,array('company'=>$company));
        return $res->result()?$res->result():[];
    }
}
