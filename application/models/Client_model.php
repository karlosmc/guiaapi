<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'client';
    /**
     * @var string
     */
    private $table_detail = 'clientaddress';
    

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
    public $tipoDoc;

    /**
     * @var string
     */
    public $numDoc;
    /**
     * @var string
     */
    public $rznSocial;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $telephone;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('address_model');
    }


    public function newClienWithAddress(): array
    {

        $this->db->insert($this->table, $this);
        $idNewClient = $this->db->insert_id();
        $this->db->insert($this->foreing_table, $this->address);
        $idNewAddress = $this->db->insert_id();

        return array('idclient' => $idNewClient, 'idaddress' => $idNewAddress);
    }

    public function getDefaultClientsByCompany(string $company){

        $this->db->select('cc.id,cc.client,tipoDoc,numDoc,rznSocial,alias');
        $this->db->from('companyclient cc');
        $this->db->join('client c','cc.client=c.id');
        $this->db->where('cc.company',$company);
        $this->db->where('isconcurrent',1);

        $res = $this->db->get();
        return $res->result()?$res->result():[];


    }
    /**
     * @return Client_model[]
     */
    public function getAll(): array
    {
        $res = $this->db->get($this->table);


        return ($res->num_rows() > 0 ? $res->result(get_class($this)) : null);
    }

    public function newClient()
    {
        $this->db->trans_begin();
        
        try {
            
            $this->db->insert($this->table, $this);
            $idNewClient = $this->db->insert_id();
            if ($idNewClient) {
                if ($idNewClient > 0) {
                    $data['success'] = true;
                    $data['message'] = 'CLIENTE INSERTADO CON EXITO';
                    
                    $this->db->trans_commit();
                    return $data;
                }
            }
        } catch (Exception $ex) {
            $this->db->trans_rollback();
            $data['success'] = false;
            $data['message'] = $ex->getMessage();
            
            return $data;
        }
        if ($this->db->trans_status() === FALSE) {
            $data['success'] = false;
            $data['message'] = 'Error en la base de datos';
            
            return $data;
        }
        
    }

    public function set(object $data)
    {
        foreach ($data as $key => $val) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key =  $val;
            }
        }
    }

    public function saveClient()
    {
    }


    public function getAddressQueryByClientId(string $clientId)
    {
        $clientAddress = $this->db->get_where($this->table_detail, array('client' => $clientId, 'isMain' => 1));
        
        $address = new Address_model();
        return $address->getAddress((int)$clientAddress->row()->address);
    }

    public function getAddressQueryByNumDoc(string $numDoc)
    {
        $cliente = $this->db->get_where($this->table, array('numdoc' => $numDoc));

        $clientAddress = $this->db->get_where($this->table_detail, array('client' => $cliente->row()->id, 'isMain' => 1));
        
        $address = new Address_model();
        return $address->getAddress((int)$clientAddress->row()->address);
    }

    public function getClientIsMain(string $numDoc){
        $res = $this->db->get_where($this->table,array('numDoc'=>$numDoc));
        $cliente= null;
        
        if($res->num_rows()>0){
            $cliente = $res->row();
            $address = $this->db->get_where($this->table_detail, array('client' => $res->row()->id, 'isMain' => 1));
            $clientAddress =  $this->db->get_where($this->foreing_table,array('id'=>$address->row()->address));
            $cliente->address=$clientAddress->row();
            
        }
        return $cliente;
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
     * Get the value of numDoc
     *
     * @return  string
     */
    public function getNumDoc()
    {
        return $this->numDoc;
    }

    /**
     * Set the value of numDoc
     *
     * @param  string  $numDoc
     *
     * @return  self
     */
    public function setNumDoc(string $numDoc)
    {
        $this->numDoc = $numDoc;

        return $this;
    }

    /**
     * Get the value of rznSocial
     *
     * @return  string
     */
    public function getRznSocial()
    {
        return $this->rznSocial;
    }

    /**
     * Set the value of rznSocial
     *
     * @param  string  $rznSocial
     *
     * @return  self
     */
    public function setRznSocial(string $rznSocial)
    {
        $this->rznSocial = $rznSocial;

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
}





                        
/* End of file client.php */
