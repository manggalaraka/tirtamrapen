<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once APPPATH."third_party/User_Auth.php";

class Userauth{
  var $CI;
  public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->config->item('base_url');
        $this->CI->load->database();       
  }

  	public function cek_loggedin(){
  		if($this->CI->session->userdata('loggedin')){
  			return TRUE;
  		}else{
  			return FALSE;
  		}
  	}

	  public function logout(){
		  $this->CI->session->sess_destroy();
	  }

    public function hash_password($data_user, $userid) {
        $salt = md5($userid);
        return hash('sha256', $salt.$data_user['data2']);
    }

    
}