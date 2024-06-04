<?php

namespace SUNAT\GRE\Error;



class Error
{
    /**
     *
     * @var string|null
     */
    public $numError;
    /**
     *
     * @var string|null
     */
    public $desError;

 
    public function set(object $data)
    {
        foreach ($data as $key => $val) {

            if (property_exists(__CLASS__, $key)) {
                
                $this->$key =  $val;
            }
        }
    }

    /**
     * Get the value of numError
     *
     * @return  string|null
     */ 
    public function getNumError()
    {
        return $this->numError;
    }

    /**
     * Set the value of numError
     *
     * @param  string|null  $numError
     *
     * @return  self
     */ 
    public function setNumError($numError)
    {
        $this->numError = $numError;

        return $this;
    }

    /**
     * Get the value of desError
     *
     * @return  string|null
     */ 
    public function getDesError()
    {
        return $this->desError;
    }

    /**
     * Set the value of desError
     *
     * @param  string|null  $desError
     *
     * @return  self
     */ 
    public function setDesError($desError)
    {
        $this->desError = $desError;

        return $this;
    }
}
