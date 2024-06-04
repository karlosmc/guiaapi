<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Token_model extends CI_Model {

    /**
     * @var string
     */
    private $table='tokenauth';

     /**
     * @var int
     */
    public $id;
     /**
     * @var string
     */
    public $company;
         /**
     * @var string
     */
    public $user;
     /**
     * @var string
     */
    public $access_token;
     /**
     * @var string
     */
    public $token_type;
     /**
     * @var string
     */
    public $expires_in;
     /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $expires_at;

    


            /**
     * @return GetToken_model
     */
    public function getTokenBD()
    {
        $sunatparams = $this->db->get($this->table);
        return ($sunatparams->num_rows()>0?$sunatparams->result(get_class($this))[0]:null);
        
    }

                /**
     * @return GetToken_model
     */
    public function getTokenByIdCompany(int $company) 
    {
        $sunatparams = $this->db->get_where($this->table,array('company'=>$company));
        return ($sunatparams->num_rows()>0?$sunatparams->result(get_class($this))[0]:null);
        
    }

    public function insertToken(){

        $this->db->insert($this->table,$this);
        
    }

    public function refreshToken(int $id){
        $data=array(
            'access_token'=>$this->getAccess_token(),
            'expires_in'=>$this->getExpires_in(),
            'created_at'=>$this->getCreated_at(),
            'expires_at'=>$this->getExpires_at()
        );

        $this->db->where('id',$id);
        $this->db->update($this->table,$data);

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
     * Get the value of company
     *
     * @return  string
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  string  $company
     *
     * @return  self
     */ 
    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of access_token
     *
     * @return  string
     */ 
    public function getAccess_token()
    {
        return $this->access_token;
    }

    /**
     * Set the value of access_token
     *
     * @param  string  $access_token
     *
     * @return  self
     */ 
    public function setAccess_token(string $access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Get the value of token_type
     *
     * @return  string
     */ 
    public function getToken_type()
    {
        return $this->token_type;
    }

    /**
     * Set the value of token_type
     *
     * @param  string  $token_type
     *
     * @return  self
     */ 
    public function setToken_type(string $token_type)
    {
        $this->token_type = $token_type;

        return $this;
    }

    /**
     * Get the value of expires_in
     *
     * @return  string
     */ 
    public function getExpires_in()
    {
        return $this->expires_in;
    }

    /**
     * Set the value of expires_in
     *
     * @param  string  $expires_in
     *
     * @return  self
     */ 
    public function setExpires_in(string $expires_in)
    {
        $this->expires_in = $expires_in;

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

    /**
     * Get the value of expires_at
     *
     * @return  string
     */ 
    public function getExpires_at()
    {
        return $this->expires_at;
    }

    /**
     * Set the value of expires_at
     *
     * @param  string  $expires_at
     *
     * @return  self
     */ 
    public function setExpires_at(string $expires_at)
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    /**
     * Get the value of user
     *
     * @return  string
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param  string  $user
     *
     * @return  self
     */ 
    public function setUser(string $user)
    {
        $this->user = $user;

        return $this;
    }
}
