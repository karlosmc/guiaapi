<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Shipment_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'shipment';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $codTraslado;
    /**
     * @var string
     */
    public $desTraslado;
    /**
     * @var bool
     */
    public $indTransbordo;
    /**
     * @var string[]
     */
    public $indicadores;
    /**
     * @var float
     */
    public $pesoItems;
    /**
     * @var string
     */
    public $sustentoPeso;
    /**
     * @var float
     */
    public $pesoTotal;
    /**
     * @var string
     */
    public $undPesoTotal;
    /**
     * @var int
     */
    public $numBultos;

    /**
     * @var string[]
     */
    public $contenedores;

    /**
     * @var Driver_model[]
     */
    public $choferes;
    

    /**
     * @var string
     */
    public $modTraslado;
    /**
     * @var string
     */
    public $fecTraslado;
    /**
     * @var Puerto_model
     */
    public $puerto;
    /**
     * @var Puerto_model
     */
    public $aeropuerto;
  
    /**
     * @var Vehicle_model
     */
    public $vehiculo;
    /**
     * @var Direction_model
     */
    public $llegada;
    /**
     * @var Direction_model
     */
    public $partida;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shipment/puerto_model');
        $this->load->model('shipment/container_model');
        $this->load->model('shipment/Indicadores_model');
        
        $this->load->model('transportista/vehicle_model');
        $this->load->model('transportista/driver_model');
      
    }


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
     * Get the value of codTraslado
     *
     * @return  string
     */ 
    public function getCodTraslado()
    {
        return $this->codTraslado;
    }

    /**
     * Set the value of codTraslado
     *
     * @param  string  $codTraslado
     *
     * @return  self
     */ 
    public function setCodTraslado(string $codTraslado)
    {
        $this->codTraslado = $codTraslado;

        return $this;
    }

    /**
     * Get the value of desTraslado
     *
     * @return  string
     */ 
    public function getDesTraslado()
    {
        return $this->desTraslado;
    }

    /**
     * Set the value of desTraslado
     *
     * @param  string  $desTraslado
     *
     * @return  self
     */ 
    public function setDesTraslado(string $desTraslado)
    {
        $this->desTraslado = $desTraslado;

        return $this;
    }

    /**
     * Get the value of indTransbordo
     *
     * @return  bool
     */ 
    public function getIndTransbordo()
    {
        return $this->indTransbordo;
    }

    /**
     * Set the value of indTransbordo
     *
     * @param  bool  $indTransbordo
     *
     * @return  self
     */ 
    public function setIndTransbordo(bool $indTransbordo)
    {
        $this->indTransbordo = $indTransbordo;

        return $this;
    }

    /**
     * Get the value of pesoItems
     *
     * @return  float
     */ 
    public function getPesoItems()
    {
        return $this->pesoItems;
    }

    /**
     * Set the value of pesoItems
     *
     * @param  float  $pesoItems
     *
     * @return  self
     */ 
    public function setPesoItems(float $pesoItems)
    {
        $this->pesoItems = $pesoItems;

        return $this;
    }

    /**
     * Get the value of pesoTotal
     *
     * @return  float
     */ 
    public function getPesoTotal()
    {
        return $this->pesoTotal;
    }

    /**
     * Set the value of pesoTotal
     *
     * @param  float  $pesoTotal
     *
     * @return  self
     */ 
    public function setPesoTotal(float $pesoTotal)
    {
        $this->pesoTotal = $pesoTotal;

        return $this;
    }

    /**
     * Get the value of undPesoTotal
     *
     * @return  string
     */ 
    public function getUndPesoTotal()
    {
        return $this->undPesoTotal;
    }

    /**
     * Set the value of undPesoTotal
     *
     * @param  string  $undPesoTotal
     *
     * @return  self
     */ 
    public function setUndPesoTotal(string $undPesoTotal)
    {
        $this->undPesoTotal = $undPesoTotal;

        return $this;
    }

    /**
     * Get the value of numBultos
     *
     * @return  int
     */ 
    public function getNumBultos()
    {
        return $this->numBultos;
    }

    /**
     * Set the value of numBultos
     *
     * @param  int  $numBultos
     *
     * @return  self
     */ 
    public function setNumBultos(int $numBultos)
    {
        $this->numBultos = $numBultos;

        return $this;
    }

 

    /**
     * Get the value of modTraslado
     *
     * @return  string
     */ 
    public function getModTraslado()
    {
        return $this->modTraslado;
    }

    /**
     * Set the value of modTraslado
     *
     * @param  string  $modTraslado
     *
     * @return  self
     */ 
    public function setModTraslado(string $modTraslado)
    {
        $this->modTraslado = $modTraslado;

        return $this;
    }

    /**
     * Get the value of fecTraslado
     *
     * @return  string
     */ 
    public function getFecTraslado()
    {
        return $this->fecTraslado;
    }

    /**
     * Set the value of fecTraslado
     *
     * @param  string  $fecTraslado
     *
     * @return  self
     */ 
    public function setFecTraslado(string $fecTraslado)
    {
        $this->fecTraslado = $fecTraslado;

        return $this;
    }

    /**
     * Get the value of puerto
     *
     * @return  Puerto_model
     */ 
    public function getPuerto()
    {
        return $this->puerto;
    }

    /**
     * Set the value of puerto
     *
     * @param  Puerto_model  $puerto
     *
     * @return  self
     */ 
    public function setPuerto(Puerto_model $puerto)
    {
        $this->puerto = $puerto;

        return $this;
    }

    /**
     * Get the value of aeropuerto
     *
     * @return  Puerto_model
     */ 
    public function getAeropuerto()
    {
        return $this->aeropuerto;
    }

    /**
     * Set the value of aeropuerto
     *
     * @param  Puerto_model  $aeropuerto
     *
     * @return  self
     */ 
    public function setAeropuerto(Puerto_model $aeropuerto)
    {
        $this->aeropuerto = $aeropuerto;

        return $this;
    }

    /**
     * Get the value of vehiculo
     *
     * @return  Vehicle_model
     */ 
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set the value of vehiculo
     *
     * @param  Vehicle_model  $vehiculo
     *
     * @return  self
     */ 
    public function setVehiculo(Vehicle_model $vehiculo)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get the value of choferes
     *
     * @return  Driver_model[]
     */ 
    public function getChoferes()
    {
        return $this->choferes;
    }

    /**
     * Set the value of choferes
     *
     * @param  Driver_model[]  $choferes
     *
     * @return  self
     */ 
    public function setChoferes(array $choferes)
    {
        $this->choferes = $choferes;

        return $this;
    }

  
    /**
     * Get the value of sustentoPeso
     *
     * @return  string
     */ 
    public function getSustentoPeso()
    {
        return $this->sustentoPeso;
    }

    /**
     * Set the value of sustentoPeso
     *
     * @param  string  $sustentoPeso
     *
     * @return  self
     */ 
    public function setSustentoPeso(string $sustentoPeso)
    {
        $this->sustentoPeso = $sustentoPeso;

        return $this;
    }

    /**
     * Get the value of llegada
     *
     * @return  Direction_model
     */ 
    public function getLlegada()
    {
        return $this->llegada;
    }

    /**
     * Set the value of llegada
     *
     * @param  Direction_model  $llegada
     *
     * @return  self
     */ 
    public function setLlegada(Direction_model $llegada)
    {
        $this->llegada = $llegada;

        return $this;
    }

    /**
     * Get the value of partida
     *
     * @return  Direction_model
     */ 
    public function getPartida()
    {
        return $this->partida;
    }

    /**
     * Set the value of partida
     *
     * @param  Direction_model  $partida
     *
     * @return  self
     */ 
    public function setPartida(Direction_model $partida)
    {
        $this->partida = $partida;

        return $this;
    }

    /**
     * Get the value of indicadores
     *
     * @return  string[]
     */ 
    public function getIndicadores()
    {
        return $this->indicadores;
    }

    /**
     * Set the value of indicadores
     *
     * @param  string[]  $indicadores
     *
     * @return  self
     */ 
    public function setIndicadores(array $indicadores)
    {
        $this->indicadores = $indicadores;

        return $this;
    }

    /**
     * Get the value of contenedores
     *
     * @return  string[]
     */ 
    public function getContenedores()
    {
        return $this->contenedores;
    }

    /**
     * Set the value of contenedores
     *
     * @param  string[]  $contenedores
     *
     * @return  self
     */ 
    public function setContenedores(array $contenedores)
    {
        $this->contenedores = $contenedores;

        return $this;
    }
}