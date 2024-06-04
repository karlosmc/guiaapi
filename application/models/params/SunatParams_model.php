<?php


defined('BASEPATH') or exit('No direct script access allowed');

class SunatParams_model extends CI_Model
{
    /**
     * @var string
     */
    private $table = 'sunatparams';


    
        /**
     * @return SunatParams_model
     */
    public function getSunatParams(string $tipo, int $empresa)
    {
        $sunatparams = $this->db->get_where($this->table,array('tipo'=>$tipo,'company'=>$empresa));
        // echo $this->db->last_query();
        
        
        
        return $sunatparams->result(get_class($this))[0];
    }

}