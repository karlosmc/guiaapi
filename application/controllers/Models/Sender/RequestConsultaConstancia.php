<?php
namespace Models\Sender\GRE;

class RequestConsultaConstancia
{

        public $Serie;
        public $Numero;
        

        /**
         * Get the value of Serie
         */ 
        public function getSerie()
        {
                return $this->Serie;
        }

        /**
         * Set the value of Serie
         *
         * @return  self
         */ 
        public function setSerie($Serie)
        {
                $this->Serie = $Serie;

                return $this;
        }

        /**
         * Get the value of Numero
         */ 
        public function getNumero()
        {
                return $this->Numero;
        }

        /**
         * Set the value of Numero
         *
         * @return  self
         */ 
        public function setNumero($Numero)
        {
                $this->Numero = $Numero;

                return $this;
        }
}