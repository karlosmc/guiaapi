<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Container_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'containers';
    /**
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $shipment;
    /**
     * @var string
     */
    public $nroContenedor;


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
     * Get the value of shipment
     *
     * @return  int
     */ 
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * Set the value of shipment
     *
     * @param  int  $shipment
     *
     * @return  self
     */ 
    public function setShipment(int $shipment)
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * Get the value of nroContenedor
     *
     * @return  string
     */ 
    public function getNroContenedor()
    {
        return $this->nroContenedor;
    }

    /**
     * Set the value of nroContenedor
     *
     * @param  string  $nroContenedor
     *
     * @return  self
     */ 
    public function setNroContenedor(string $nroContenedor)
    {
        $this->nroContenedor = $nroContenedor;

        return $this;
    }
}