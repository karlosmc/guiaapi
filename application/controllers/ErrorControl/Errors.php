<?php

namespace SUNAT\GRE\Error;



class Errors
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
}