<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Despatch_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'despatch';
    private $table_additional = 'additionaldoc';
    private $table_detail = 'despatchdetail';
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $tipoDoc;
    /**
     * @var string
     */
    public $serie;
    /**
     * @var string
     */
    public $correlativo;
    /**
     * @var string
     */
    public $observacion;
    /**
     * @var string
     */
    public $fechaEmision;
    /**
     * @var Company_model
     */
    public $company;
    /**
     * @var Client_model
     */
    public $destinatario;
    /**
     * @var Client_model
     */
    public $tercero;
    /**
     * @var Client_model
     */
    public $comprador;

    /**
     * @var Shipment_model
     */
    public $envio;

    /**
     * @var Additional_model[]
     */
    public $addDocs;

    /**
     * @var DespatchDetail_model[]
     */
    public $details;




    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->load->model('client_model');
        $this->load->model('relacionados/additionaldoc_model');
        $this->load->model('despatch/despatchdetail_model');
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
     * Get the value of version
     *
     * @return  string
     */ 
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of version
     *
     * @param  string  $version
     *
     * @return  self
     */ 
    public function setVersion(string $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the value of tipoDoc
     *
     * @return  string
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @param  string  $tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc(string $tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of serie
     *
     * @return  string
     */ 
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set the value of serie
     *
     * @param  string  $serie
     *
     * @return  self
     */ 
    public function setSerie(string $serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get the value of correlativo
     *
     * @return  string
     */ 
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set the value of correlativo
     *
     * @param  string  $correlativo
     *
     * @return  self
     */ 
    public function setCorrelativo(string $correlativo)
    {
        $this->correlativo = $correlativo;

        return $this;
    }

    /**
     * Get the value of observacion
     *
     * @return  string
     */ 
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set the value of observacion
     *
     * @param  string  $observacion
     *
     * @return  self
     */ 
    public function setObservacion(string $observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    

    /**
     * Get the value of company
     *
     * @return  Company_model
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  Company_model  $company
     *
     * @return  self
     */ 
    public function setCompany(Company_model $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of destinatario
     *
     * @return  Client_model
     */ 
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set the value of destinatario
     *
     * @param  Client_model  $destinatario
     *
     * @return  self
     */ 
    public function setDestinatario(Client_model $destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get the value of tercero
     *
     * @return  Client_model
     */ 
    public function getTercero()
    {
        return $this->tercero;
    }

    /**
     * Set the value of tercero
     *
     * @param  Client_model  $tercero
     *
     * @return  self
     */ 
    public function setTercero(Client_model $tercero)
    {
        $this->tercero = $tercero;

        return $this;
    }

    /**
     * Get the value of comprador
     *
     * @return  Client_model
     */ 
    public function getComprador()
    {
        return $this->comprador;
    }

    /**
     * Set the value of comprador
     *
     * @param  Client_model  $comprador
     *
     * @return  self
     */ 
    public function setComprador(Client_model $comprador)
    {
        $this->comprador = $comprador;

        return $this;
    }

    /**
     * Get the value of envio
     *
     * @return  Shipment_model
     */ 
    public function getEnvio()
    {
        return $this->envio;
    }

    /**
     * Set the value of envio
     *
     * @param  Shipment_model  $envio
     *
     * @return  self
     */ 
    public function setEnvio(Shipment_model $envio)
    {
        $this->envio = $envio;

        return $this;
    }

    /**
     * Get the value of addDocs
     *
     * @return  Additional_model[]
     */ 
    public function getAddDocs()
    {
        return $this->addDocs;
    }

    /**
     * Set the value of addDocs
     *
     * @param  Additional_model[]  $addDocs
     *
     * @return  self
     */ 
    public function setAddDocs(array $addDocs)
    {
        $this->addDocs = $addDocs;

        return $this;
    }

    /**
     * Get the value of details
     *
     * @return  DespatchDetail_model[]
     */ 
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set the value of details
     *
     * @param  DespatchDetail_model[]  $details
     *
     * @return  self
     */ 
    public function setDetails(array $details)
    {
        $this->details = $details;

        return $this;
    }

    public function getName(){
        $parts = [
            $this->company->getRuc(),
            $this->getTipoDoc(),
            $this->getSerie(),
            $this->getCorrelativo(),
        ];

        return join('-',$parts);


    }

    /**
     * Get the value of fechaEmision
     *
     * @return  string
     */ 
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set the value of fechaEmision
     *
     * @param  string  $fechaEmision
     *
     * @return  self
     */ 
    public function setFechaEmision(string $fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

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

    public function insert(){
        $this->db->insert($this->table,$this);
    }
}
