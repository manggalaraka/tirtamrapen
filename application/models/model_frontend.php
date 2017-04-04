<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_frontend extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mget_all_atribute(){
    	$this->db->select('*');
        $this->db->from('profile_tm as A');
        $this->db->join('photohead_profile_tm as B', 'B.id_photo = A.info_cover_tm'); 
        $this->db->where('A.profile_is_deleted', '0');   
    	$query = $this->db->get();
	    	if($query->num_rows() == 1){
	    		return $query;
	    	}else{
	    		return FALSE;
	    	}
    }

    

}

