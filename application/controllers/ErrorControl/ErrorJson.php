<?php

namespace SUNAT\GRE\Error;



class ErrorJson
{
    /**
     *
     * @var string|null
     */
    public $cod;
    /**
     *
     * @var string[]|null
     */
    public $msg;
    /**
     *
     * @var string|null
     */
    public $exc;
    /**
     *
     * @var Error|null
     */
    public $errors;

    /**
     * Get the value of cod
     *
     * @return  string|null
     */ 
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of cod
     *
     * @param  string|null  $cod
     *
     * @return  self
     */ 
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * Get the value of msg
     *
     * @return  string[]|null
     */ 
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set the value of msg
     *
     * @param  string[]|null  $msg
     *
     * @return  self
     */ 
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get the value of exc
     *
     * @return  string|null
     */ 
    public function getExc()
    {
        return $this->exc;
    }

    /**
     * Set the value of exc
     *
     * @param  string|null  $exc
     *
     * @return  self
     */ 
    public function setExc($exc)
    {
        $this->exc = $exc;

        return $this;
    }



    /**
     * Get the value of errors
     *
     * @return  Errors|null
     */ 
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @param  Errors|null  $errors
     *
     * @return  self
     */ 
    public function setErrors(Errors $errors)
    {
        $this->errors = $errors;

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
}
