<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_login extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function mcek_user_login($data_user,$hash){
    	$user = $data_user['data1'];
    	$this->db->select('*');
    	$this->db->from('akun_user_tm');
        $this->db->where("(email_akun='$user' OR nama_akun='$user')", NULL, FALSE);
        $this->db->where('password_akun',$hash);
    	$query = $this->db->get();
	    	if($query->num_rows() == 1){
	    		return $query;
	    	}else{
	    		return FALSE;
	    	}
    }

    public function mcek_user_exist($data_user){
        $user = $data_user['data1'];
        $this->db->select('id_akun');  
        $this->db->from('akun_user_tm');
        $this->db->where("(email_akun='$user' OR nama_akun='$user')", NULL, FALSE);
        $query = $this->db->get();
            if($query->num_rows() == 1){
                return $query;
            }else{
                return FALSE;
            }  
    }

}

