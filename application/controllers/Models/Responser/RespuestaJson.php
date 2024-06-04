<?php

namespace Models\Responser;

use SUNAT\GRE\Error\ErrorJson;

class RespuestaJson
{

    /**
     *
     * @var string
     */
    public $numTicket;
    /**
     *
     * @var string
     */
    public $fecRecepcion;

    /**
     *
     * @var ErrorJson
     */
    public $ErrorJson;


    /**
     *
     * @var bool
     */
    public $exito;

        /**
     *
     * @var string
     */
    public $status;


    /**
     * Get the value of numTicket
     *
     * @return  string
     */
    public function getNumTicket()
    {
        return $this->numTicket;
    }

    /**
     * Set the value of numTicket
     *
     * @param  string  $numTicket
     *
     * @return  self
     */
    public function setNumTicket(string $numTicket)
    {
        $this->numTicket = $numTicket;

        return $this;
    }

    /**
     * Get the value of fecRecepcion
     *
     * @return  string
     */
    public function getFecRecepcion()
    {
        return $this->fecRecepcion;
    }

    /**
     * Set the value of fecRecepcion
     *
     * @param  string  $fecRecepcion
     *
     * @return  self
     */
    public function setFecRecepcion(string $fecRecepcion)
    {
        $this->fecRecepcion = $fecRecepcion;

        return $this;
    }

    public function set(object $data)
    {
        foreach ($data as $key => $val) {

            if (property_exists(__CLASS__, $key)) {
                
                $this->$key =  $val;
            }
        }
    }

    /**
     * Get the value of ErrorJson
     *
     * @return  ErrorJson
     */
    public function getErrorJson()
    {
        return $this->ErrorJson;
    }

    /**
     * Set the value of ErrorJson
     *
     * @param  ErrorJson  $ErrorJson
     *
     * @return  self
     */
    public function setErrorJson(ErrorJson $ErrorJson)
    {
        $this->ErrorJson = $ErrorJson;

        return $this;
    }



    /**
     * Get the value of status
     *
     * @return  string
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param  string  $status
     *
     * @return  self
     */ 
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of exito
     *
     * @return  bool
     */ 
    public function getExito()
    {
        return $this->exito;
    }

    /**
     * Set the value of exito
     *
     * @param  bool  $exito
     *
     * @return  self
     */ 
    public function setExito(bool $exito)
    {
        $this->exito = $exito;

        return $this;
    }
}
