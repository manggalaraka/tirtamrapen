<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>'); 
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

    public function index(){
      if($this->userauth->cek_loggedin()){
      		redirect('administrator');
   	 	}else{
			$this->load->view('LOGIN/header_footer_login/header_login');
			$this->load->view('LOGIN/content_login/v_login');
			$this->load->view('LOGIN/header_footer_login/footer_login');    	
    	}
	}

	// public function login_form(){
	// 	$user = $this->input->post('user');
	// 	$pass = md5($this->input->post('password'));
	// 	$id = null;
	// 	$data_user = array('data1'=>$user,
	// 					   'data2'=>$pass);	
	// 	$cek_exist = $this->cek_user_exist($data_user);
	// 	if($cek_exist){
	// 		$hash = $this->userauth->hash_password($data_user,$cek_exist);
	// 		$cek_login = $this->model_login->mcek_user_login($data_user,$hash);
	// 		if($cek_login){
	// 			foreach($cek_login->result() as $hasil){
	// 				$data_sesion = array('log_nama'=>$hasil->nama_akun,
	// 									 'log_email'=>$hasil->email_akun,
	// 									 'log_previlege'=>$hasil->previlege_akun,
 //                						 'loggedin' => TRUE);
	// 			}
	// 		$this->session->set_userdata($data_sesion);
	// 		$this->session->set_flashdata('greeting', "Selamat Datang ".$user);
	// 		redirect('administrator');
	// 		}else{
	// 			echo "gagal";
	// 		}	
	// 	}else{
	// 		echo "tidak ada data";
	// 	}
	// }

	public function login_form(){
		$user = $this->input->post('user');
		$pass = $this->input->post('password');
		if($user == "manggala" && $pass = "12345"){
			$data_sesion = array('log_nama'=>"manggala",
								 'log_email'=>"manggalaraka@gmail.com",
								 'log_previlege'=>"admin",
        						 'loggedin' => TRUE);
			$this->session->set_userdata($data_sesion);
			$this->session->set_flashdata('greeting', "Selamat Datang ".$user);
			redirect('administrator');
		}else{
			echo "tidak ada data";
		}
	}

	public function cek_user_exist($data_user){
		$cek_exist = $this->model_login->mcek_user_exist($data_user);
		if($cek_exist){
			foreach($cek_exist->result() as $hasil){ $id = $hasil->id_akun;}
			return $id;
		}else{
			return false;
		}
	}

	public function logout(){
		$this->userauth->logout();
		redirect('login');
	}


}
