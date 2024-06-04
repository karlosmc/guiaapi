<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Transportist_model extends CI_Model
{

    /**
     * @var string
     */
    private $table = 'transportist';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $tipoDoc;
    /**
     * @var string
     */
    public $numDoc;
    /**
     * @var string
     */
    public $rznSocial;
    /**
     * @var string
     */
    public $nroMtc;


    

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
     * Get the value of tipoDoc
     *
     * @return  string
     */ 
    public function getTipoDoc():?string
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
    public function setTipoDoc(?string $tipoDoc):Transportist_model
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of numDoc
     *
     * @return  string
     */ 
    public function getNumDoc():?string
    {
        return $this->numDoc;
    }

    /**
     * Set the value of numDoc
     *
     * @param  string  $numDoc
     *
     * @return  self
     */ 
    public function setNumDoc(?string $numDoc):Transportist_model
    {
        $this->numDoc = $numDoc;

        return $this;
    }

    /**
     * Get the value of rznSocial
     *
     * @return  string
     */ 
    public function getRznSocial():?string
    {
        return $this->rznSocial;
    }

    /**
     * Set the value of rznSocial
     *
     * @param  string  $rznSocial
     *
     * @return  self
     */ 
    public function setRznSocial(?string $rznSocial):Transportist_model
    {
        $this->rznSocial = $rznSocial;

        return $this;
    }

    /**
     * Get the value of nroMtc
     *
     * @return  string
     */ 
    public function getNroMtc():string
    {
        return $this->nroMtc;
    }

    /**
     * Set the value of nroMtc
     *
     * @param  string  $nroMtc
     *
     * @return  self
     */ 
    public function setNroMtc(?string $nroMtc):Transportist_model
    {
        $this->nroMtc = $nroMtc;

        return $this;
    }

}
