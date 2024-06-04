<?php

namespace Models\Sender\GRE;

class RequestToken
{

        public $client_id;
        public $client_secret;
        public $username;
        public $password;
        public $grant_type;
        public $scope;
        private $EndPointUrl;

        /**
         * Get the value of client_id
         */
        public function getClient_id()
        {
                return $this->client_id;
        }

        /**
         * Set the value of client_id
         *
         * @return  self
         */
        public function setClient_id($client_id)
        {
                $this->client_id = $client_id;

                return $this;
        }

        /**
         * Get the value of client_secret
         */
        public function getClient_secret()
        {
                return $this->client_secret;
        }

        /**
         * Set the value of client_secret
         *
         * @return  self
         */
        public function setClient_secret($client_secret)
        {
                $this->client_secret = $client_secret;

                return $this;
        }

        /**
         * Get the value of username
         */
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of grant_type
         */
        public function getGrant_type()
        {
                return $this->grant_type;
        }

        /**
         * Set the value of grant_type
         *
         * @return  self
         */
        public function setGrant_type($grant_type)
        {
                $this->grant_type = $grant_type;

                return $this;
        }

        /**
         * Get the value of scope
         */
        public function getScope()
        {
                return $this->scope;
        }

        /**
         * Set the value of scope
         *
         * @return  self
         */
        public function setScope($scope)
        {
                $this->scope = $scope;

                return $this;
        }

        /**
         * Get the value of EndPointUrl
         */
        public function getEndPointUrl($replace)
        {
                return str_replace($replace, $this->getClient_id(), $this->EndPointUrl);
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
         * Get the value of password
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
}
