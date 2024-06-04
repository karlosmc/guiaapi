<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Direction_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'direction';

    /**
     * @var string
     */
    private $tableDetail = 'companydirection';

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
    public $direccion;
    /**
     * @var string
     */
    public $codlocal;
    /**
     * @var string
     */
    public $ruc;


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
     * Get the value of codlocal
     *
     * @return  string
     */ 
    public function getCodlocal()
    {
        return $this->codlocal;
    }

    /**
     * Set the value of codlocal
     *
     * @param  string  $codlocal
     *
     * @return  self
     */ 
    public function setCodlocal(string $codlocal)
    {
        $this->codlocal = $codlocal;

        return $this;
    }

    /**
     * Get the value of ruc
     *
     * @return  string
     */ 
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set the value of ruc
     *
     * @param  string  $ruc
     *
     * @return  self
     */ 
    public function setRuc(string $ruc)
    {
        $this->ruc = $ruc;

        return $this;
    }

    /**
    * Set the value of contenedores
    *
    * @param  int  $company
    *
    * @return  array
    */ 

    public function getDirectionsByCompanyConcurrent(int $company){

        $this->db->select('cd.id,cd.company,cd.direction,cd.isconcurrent,tipo,alias,ubigeo,d.direccion,codlocal,ruc');
        $this->db->from('companydirection cd');
        $this->db->join('direction d','cd.direction=d.id');
        $this->db->where('cd.company',$company);
        $this->db->where('isconcurrent',1);
        $res = $this->db->get();
        return $res->result()?$res->result():[];

    }
}