<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  /**
   * @var string
   */
  private $table = 'user';

  /**
   * @var int
   */
  public $id;

  /**
   * @var string
   */
  public $alias;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $nrodoc;
  /**
   * @var string
   */
  public $fullname;
  /**
   * @var string
   */
  public $tipo;
  /**
   * @var string
   */
  public $estado;

  /**
   * @var string
   */
  public $created_at;

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
   * Get the value of alias
   *
   * @return  string
   */ 
  public function getAlias()
  {
    return $this->alias;
  }

  /**
   * Set the value of alias
   *
   * @param  string  $alias
   *
   * @return  self
   */ 
  public function setAlias(string $alias)
  {
    $this->alias = $alias;

    return $this;
  }

  /**
   * Get the value of password
   *
   * @return  string
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @param  string  $password
   *
   * @return  self
   */ 
  public function setPassword(string $password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of email
   *
   * @return  string
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @param  string  $email
   *
   * @return  self
   */ 
  public function setEmail(string $email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of nrodoc
   *
   * @return  string
   */ 
  public function getNrodoc()
  {
    return $this->nrodoc;
  }

  /**
   * Set the value of nrodoc
   *
   * @param  string  $nrodoc
   *
   * @return  self
   */ 
  public function setNrodoc(string $nrodoc)
  {
    $this->nrodoc = $nrodoc;

    return $this;
  }

  /**
   * Get the value of fullname
   *
   * @return  string
   */ 
  public function getFullname()
  {
    return $this->fullname;
  }

  /**
   * Set the value of fullname
   *
   * @param  string  $fullname
   *
   * @return  self
   */ 
  public function setFullname(string $fullname)
  {
    $this->fullname = $fullname;

    return $this;
  }

  /**
   * Get the value of tipo
   *
   * @return  string
   */ 
  public function getTipo()
  {
    return $this->tipo;
  }

  /**
   * Set the value of tipo
   *
   * @param  string  $tipo
   *
   * @return  self
   */ 
  public function setTipo(string $tipo)
  {
    $this->tipo = $tipo;

    return $this;
  }

  /**
   * Get the value of estado
   *
   * @return  string
   */ 
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Set the value of estado
   *
   * @param  string  $estado
   *
   * @return  self
   */ 
  public function setEstado(string $estado)
  {
    $this->estado = $estado;

    return $this;
  }

  /**
   * Get the value of created_at
   *
   * @return  string
   */ 
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @param  string  $created_at
   *
   * @return  self
   */ 
  public function setCreated_at(string $created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }


  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('transportista/driver_model');
    $this->load->model('shipment/direction_model');
    $this->load->model('client_model');
  }
  

  public function LogIn(string $nrodoc,string $password,string $company,string $vehiculo){

    $res = $this->db->get_where($this->table,array('nrodoc'=>$nrodoc,'password'=>$password,'company'=>$company));
        
    if($res->row()){

      $driverModel = new Driver_model();
      $driver = $driverModel->getDriverByNroDoc($res->row()->nrodoc);
      $login=$res->row();

      $directionModel = new Direction_model();
      $directions = $directionModel->getDirectionsByCompanyConcurrent((int)$company);

      $login->driver=$driver;
      $login->directions = $directions;
      $login->sercor = $this->getSerieCorrelativoByCompanyAndVehicle($company,$vehiculo);

      $clientModel = new Client_model();

      $clientsDefault = $clientModel->getDefaultClientsByCompany($company);

      $login->clientes = $clientsDefault;
      $login->products = $this->getDefaultsProductsByCompany($company);
      $login->fullcompany = $this->getCompanyById($company);


      return $login;
    }

    else{
      return false;
    }
  }

  public function getDefaultsProductsByCompany(string $company){

    $this->db->select('cp.id,cp.company,cp.product,codigo,codProdSunat,descripcion,alias,unidad');
    $this->db->from('companyproduct cp');
    $this->db->join('product p','cp.product=p.id');
    $this->db->where('cp.company',$company);
    $this->db->where('isconcurrent',1);

    $res = $this->db->get();
    return $res->result()?$res->result():[];
  }

  public function getSerieCorrelativoByCompanyAndVehicle(string $company,string $vehiculo){
    $this->db->select('serie,correlativo');
    $this->db->from('numeracion nu');
    $this->db->join(' companyvehicle cve','nu.company=cve.company and cve.vehicle=nu.vehicle');
    $this->db->join(' vehicle ve','cve.vehicle=ve.id');
    $this->db->where('nu.company',$company);
    $this->db->where('ve.placa',$vehiculo);
    $res = $this->db->get();
    return $res->row();

  }

  public function getCompanyById(string $company){
    $res=$this->db->get_where('company',array('id'=>$company));
    return $res->result()?$res->row():null;
  }
  
}
