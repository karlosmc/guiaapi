<?php

class Clientaddress_model extends CI_Model {

/**
* @var string
*/
private $table='clientaddress';

/**
* @var int
*/
public $id;

/**
* @var int
*/
public $client;
/**
* @var int
*/
public $address;

/**
* @var bool
*/
public $isMain;

   /**
* @var string
*/
public $otherEmail;
/**
* @var string
*/
public $otherTelephone;




public function newClientAddress(){
   $this->db->insert($this->table,$this);
   echo $this->db->last_query();
}

/**
* Get the value of client
*
* @return  int
*/ 
public function getClient()
{
   return $this->client;
}

/**
* Set the value of client
*
* @param  int  $client
*
* @return  self
*/ 
public function setClient(int $client)
{
   $this->client = $client;

   return $this;
}

/**
* Get the value of address
*
* @return  int
*/ 
public function getAddress()
{
   return $this->address;
}

/**
* Set the value of address
*
* @param  int  $address
*
* @return  self
*/ 
public function setAddress(int $address)
{
   $this->address = $address;

   return $this;
}

/**
* Get the value of isMain
*
* @return  bool
*/ 
public function getIsMain()
{
   return $this->isMain;
}

/**
* Set the value of isMain
*
* @param  bool  $isMain
*
* @return  self
*/ 
public function setIsMain(bool $isMain)
{
   $this->isMain = $isMain;

   return $this;
}

/**
* Get the value of otherEmail
*
* @return  string
*/ 
public function getOtherEmail()
{
   return $this->otherEmail;
}

/**
* Set the value of otherEmail
*
* @param  string  $otherEmail
*
* @return  self
*/ 
public function setOtherEmail(string $otherEmail)
{
   $this->otherEmail = $otherEmail;

   return $this;
}

/**
* Get the value of otherTelephone
*
* @return  bool
*/ 
public function getOtherTelephone()
{
   return $this->otherTelephone;
}

/**
* Set the value of otherTelephone
*
* @param  string  $otherTelephone
*
* @return  self
*/ 
public function setOtherTelephone(?string $otherTelephone)
{
   $this->otherTelephone = $otherTelephone;

   return $this;
}
}
