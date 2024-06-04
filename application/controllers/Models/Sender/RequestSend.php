<?php
namespace Models\Sender;

class RequestSend
{

        public $Ruc;
        public $IdDocumento;
        public $TipoDocumento;
        public $ClaveSol;
        public $UsuarioSol;
        public $EndPointUrl;

        public $TramaXmlFirmado;
        public $NombreArchivo;

        public $token;
        

        /**
         * Get the value of Ruc
         */ 
        public function getRuc()
        {
                return $this->Ruc;
        }

        /**
         * Set the value of Ruc
         *
         * @return  self
         */ 
        public function setRuc($Ruc)
        {
                $this->Ruc = $Ruc;

                return $this;
        }

        /**
         * Get the value of IdDocumento
         */ 
        public function getIdDocumento()
        {
                return $this->IdDocumento;
        }

        /**
         * Set the value of IdDocumento
         *
         * @return  self
         */ 
        public function setIdDocumento($IdDocumento)
        {
                $this->IdDocumento = $IdDocumento;

                return $this;
        }

        /**
         * Get the value of TipoDocumento
         */ 
        public function getTipoDocumento()
        {
                return $this->TipoDocumento;
        }

        /**
         * Set the value of TipoDocumento
         *
         * @return  self
         */ 
        public function setTipoDocumento($TipoDocumento)
        {
                $this->TipoDocumento = $TipoDocumento;

                return $this;
        }

        /**
         * Get the value of ClaveSol
         */ 
        public function getClaveSol()
        {
                return $this->ClaveSol;
        }

        /**
         * Set the value of ClaveSol
         *
         * @return  self
         */ 
        public function setClaveSol($ClaveSol)
        {
                $this->ClaveSol = $ClaveSol;

                return $this;
        }

        /**
         * Get the value of UsuarioSol
         */ 
        public function getUsuarioSol()
        {
                return $this->UsuarioSol;
        }

        /**
         * Set the value of UsuarioSol
         *
         * @return  self
         */ 
        public function setUsuarioSol($UsuarioSol)
        {
                $this->UsuarioSol = $UsuarioSol;

                return $this;
        }

        /**
         * Get the value of EndPointUrl
         */ 
        public function getEndPointUrl()
        {
                return $this->EndPointUrl;
        }

        /**
         * Set the value of EndPointUrl
         *
         * @return  self
         */ 
        public function setEndPointUrl($EndPointUrl)
        {
                $this->EndPointUrl = $EndPointUrl;

                return $this;
        }

        /**
         * Get the value of TramaXml
         */ 
        public function getTramaXmlFirmado()
        {
                return $this->TramaXmlFirmado;
        }

        /**
         * Set the value of TramaXml
         *
         * @return  self
         */ 
        public function setTramaXmlFirmado($TramaXmlFirmado)
        {
                $this->TramaXmlFirmado = $TramaXmlFirmado;

                return $this;
        }

        /**
         * Get the value of NombreArchivo
         */ 
        public function getNombreArchivo()
        {
                return $this->NombreArchivo;
        }

        /**
         * Set the value of NombreArchivo
         *
         * @return  self
         */ 
        public function setNombreArchivo($NombreArchivo)
        {
                $this->NombreArchivo = $NombreArchivo;

                return $this;
        }

        /**
         * Get the value of token
         */ 
        public function getToken()
        {
                return $this->token;
        }

        /**
         * Set the value of token
         *
         * @return  self
         */ 
        public function setToken($token)
        {
                $this->token = $token;

                return $this;
        }
}