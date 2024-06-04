<?php

namespace Models\Responser;

use Models\Response\CdrResponse;
use SUNAT\GRE\Error\Error;
use SUNAT\GRE\Error\ErrorJson;

class RespuestaConsultaGuia
{

    /**
     *
     * @var string
     */
    public $codRespuesta;

    /**
     *
     * @var Error
     */
    public $error;

    /**
     *
     * @var string
     */
    public $arcCdr;
    /**
     *
     * @var string
     */
    public $indCdrGenerado;


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
     *
     * @var ErrorJson
     */
    public $ErrorJson;

     /**
     *
     * @var CdrResponse
     */
    public $CdrResponse;


    public function set(object $data)
    {
        foreach ($data as $key => $val) {

            if (property_exists(__CLASS__, $key)) {
                
                $this->$key =  $val;
            }
        }
    }

    /**
     * Get the value of codRespuesta
     *
     * @return  string
     */ 
    public function getCodRespuesta()
    {
        return $this->codRespuesta;
    }

    /**
     * Set the value of codRespuesta
     *
     * @param  string  $codRespuesta
     *
     * @return  self
     */ 
    public function setCodRespuesta(string $codRespuesta)
    {
        $this->codRespuesta = $codRespuesta;

        return $this;
    }

    /**
     * Get the value of error
     *
     * @return  Error
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param  Error  $error
     *
     * @return  self
     */ 
    public function setError(Error $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of arcCdr
     *
     * @return  string
     */ 
    public function getArcCdr()
    {
        return $this->arcCdr;
    }

    /**
     * Set the value of arcCdr
     *
     * @param  string  $arcCdr
     *
     * @return  self
     */ 
    public function setArcCdr(string $arcCdr)
    {
        $this->arcCdr = $arcCdr;

        return $this;
    }

    /**
     * Get the value of indCdrGenerado
     *
     * @return  string
     */ 
    public function getIndCdrGenerado()
    {
        return $this->indCdrGenerado;
    }

    /**
     * Set the value of indCdrGenerado
     *
     * @param  string  $indCdrGenerado
     *
     * @return  self
     */ 
    public function setIndCdrGenerado(string $indCdrGenerado)
    {
        $this->indCdrGenerado = $indCdrGenerado;

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
     * Get the value of CdrResponse
     *
     * @return  CdrResponse
     */ 
    public function getCdrResponse()
    {
        return $this->CdrResponse;
    }

    /**
     * Set the value of CdrResponse
     *
     * @param  CdrResponse  $CdrResponse
     *
     * @return  self
     */ 
    public function setCdrResponse(CdrResponse $CdrResponse)
    {
        $this->CdrResponse = $CdrResponse;

        return $this;
    }
}
