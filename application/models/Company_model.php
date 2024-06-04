<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'company';
    /**
     * @var string
     */
    private $table_detail = 'companyaddress';

    /**
     * @var string
     */
    private $foreing_table = 'address';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $ruc;
    /**
     * @var string
     */
    public $razonSocial;
    /**
     * @var string
     */
    public $nombreComercial;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $telephone;

    /**
     * @var Address_model
     */
    public $Address;



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
     * Get the value of ruc
     *
     * @return  string
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set the value of ruc
     *
     * @param  string  $ruc
     *
     * @return  self
     */
    public function setRuc(string $ruc)
    {
        $this->ruc = $ruc;

        return $this;
    }

    /**
     * Get the value of razonSocial
     *
     * @return  string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set the value of razonSocial
     *
     * @param  string  $razonSocial
     *
     * @return  self
     */
    public function setRazonSocial(string $razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get the value of nombreComercial
     *
     * @return  string
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * Set the value of nombreComercial
     *
     * @param  string  $nombreComercial
     *
     * @return  self
     */
    public function setNombreComercial(string $nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;

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
     * Get the value of telephone
     *
     * @return  string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @param  string  $telephone
     *
     * @return  self
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
    
    /**
     * Get the value of Address
     *
     * @return  Address_model
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Set the value of Address
     *
     * @param  Address_model  $Address
     *
     * @return  self
     */
    public function setAddress(Address_model $Address)
    {
        $this->Address = $Address;

        return $this;
    }



    public function __construct()
    {
        parent::__construct();
        $this->load->model('Address_model');
    }



    /**
     * @return Company_model
     */
    public function getCompany()
    {
        $company = $this->db->get($this->table);
        return $company->result(get_class($this))[0];
    }

    public function getCompanyById(string $companyId)
    {
        $company = $this->db->get_where($this->table,array('id'=>$companyId));
        return $company->result(get_class($this))[0];
    }

    /**
     * @return Address_model
     */

    public function getAddressQuery(Company_model $company)
    {
        $companyAddress = $this->db->get($this->table_detail, array('company' => $company->getId(), 'isMain' => 1));
        // echo $this->db->last_query();
        
        $address = new Address_model();
        return $address->getAddress((int)$companyAddress->row()->address);
    }

    
    public function getAddressQueryByCompanyId(string $companyId)
    {
        $companyAddress = $this->db->get_where($this->table_detail, array('company' => $companyId, 'isMain' => 1));
        
        $address = new Address_model();
        return $address->getAddress((int)$companyAddress->row()->address);
    }

    

    public function getCompanyStore(string $companyId){
        $company = $this->getCompanyById($companyId);
        $company->setAddress($this->getAddressQueryByCompanyId($companyId));
        return $company;
    }
}





                        
/* End of file client.php */
