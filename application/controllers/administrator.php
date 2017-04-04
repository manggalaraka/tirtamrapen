<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_profile');
        $this->load->model('model_menu');
        $this->load->model('model_galeri');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        if($this->userauth->cek_loggedin()){
        $this->data = array('log_nama'=>$this->session->userdata('log_nama'),
  						   'log_email'=>$this->session->userdata('email'),
						   'log_previlege'=>$this->session->userdata('log_previlege'),
						   'content_message'=> $this->adm_message(),
						   'content_notif'=> $this->adm_notification(),
						   'content_setting'=> $this->adm_setting(),
						   'content_menubar'=> $this->adm_menubar(),
						   'content_search'=> $this->adm_search(),
						   'content_report_successornot'=>$this->userreport->call_flashdata_report()); 
		}else{
			redirect('login');
		}       
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data['judul'] = "Dashboard";
		$data['content_page'] = $this->adm_example1();
		$data['external_footer'] = null;
		$data['function_footer'] = null;
		$data['external_initialization'] = $this->initialization_index();
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator');
	}

	public function profile_baru(){
		$total_row = $this->model_profile->mcek_jumlah_profile();
		if($total_row == 0 ){
		$data['judul'] = "Profile Baru";
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_newprofile', $data, TRUE);
		$data['external_footer'] = $this->external_function_edit_profile();
		$data['function_footer'] = null;
		$data['external_initialization'] = null;
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);
		}else{
		$this->session->set_flashdata('error', "Tidak Bisa Menambahkan Profile Baru ( Maximal 1 Profile)");
        redirect('administrator');			
		}
	}

	public function profile_kelola(){
		$total_row = $this->model_profile->mcek_jumlah_profile();
		if($total_row == 1 ){
		$data['judul'] = "Kelola Profile";
		$data['data_edit_profile'] = $this->model_profile->mget_data_profile_exist();
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_editprofile', $data, TRUE);
		$data['external_footer'] = $this->external_function_edit_profile();
		$data['function_footer'] = null;
		$data['external_initialization'] = null;
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);
		}else{
		$this->session->set_flashdata('error', "Terjadi Kesalahan, Profile Baru Belum Ditambahkan");
        redirect('administrator');
		}
	}	

	public function profile_photoheader(){
		$data['judul'] = "Photo Profile Header";
		$data['judul_panel'] = "Kelola Photo Header";
		$data['data_photoheader_profile'] = $this->model_profile->mget_data_photoheader_exist();	
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_photoheader', $data, TRUE);
		$data['external_footer'] = null;
		$data['function_footer'] = $this->footer_function_photolist_profile();
		$data['external_initialization'] = null;
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);
	}

	public function galeri_baru(){
		$data['judul'] = "Galeri Baru";
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_newgallery', $data, TRUE);
		$data['external_footer'] = null;
		$data['function_footer'] = null;
		$data['external_initialization'] = null;
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);		
	}

	public function menu_baru(){
		$data['judul'] = "Daftar Menu Baru";
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_newmenu', $data, TRUE);
		$data['external_footer'] = $this->load->view('ADM/header_footer_administrator/footer_validation', null, TRUE);
		$data['function_footer'] = null;
		$data['external_initialization'] = $this->load->view('ADM/header_footer_administrator/initialization_validation', null, TRUE);
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);		
	}

	public function photomenu_upload_or_skip(){
		$id_menu = $this->session->userdata('id_menu_tm');
		$nama_menu = $this->session->userdata('nama_menu_tm');
		if(!empty($id_menu) and !empty($nama_menu)){			
			$this->session->set_flashdata('sukses', "menu "."<strong>".$nama_menu."</strong>"." berhasil ditambahkan");
			$data['judul'] = "Foto Menu";
			$data['param1'] = $id_menu;
			$data['param2'] = $nama_menu;
			$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_photomenu_skip', $data, TRUE);
			$data['external_footer'] = null;
			$data['function_footer'] = null;
			$data['external_initialization'] = null;
			$this->load->view('ADM/header_footer_administrator/header_administrator');
			$this->load->view('ADM/content_administrator/v_navbartop',$data);
			$this->load->view('ADM/content_administrator/v_navbar');
			$this->load->view('ADM/content_administrator/v_administratorall',$data);
			$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);

			$this->session->unset_userdata('id_menu_tm');
			$this->session->unset_userdata('nama_menu_tm');
		}else{
			$this->session->set_flashdata('error', " Halaman Tidak Bisa Diakses");
			redirect('administrator');
		}
	}

	public function menu_kelola(){
		$data['judul'] = "Kelola Daftar Menu";
		$data['panel_title'] = "Daftar Menu";
		
		$indikator_search = $this->input->get('search', TRUE);
    	$indikator_kategori = $this->input->get('kategori', TRUE);
    	if($indikator_search){$a=array("indikator1"=>$indikator_search); $data['keyword_pencarian']=$indikator_search;}else{$a=array(); $data['keyword_pencarian']=null;}
    	if($indikator_kategori){$b=array("indikator2"=>$indikator_kategori);}else{$b=array();}
	    $indikator = array_merge($a,$b); 	
		if(empty($indikator)){
			$data_menu = $this->model_menu->mget_daftar_menu();	
		}else{
			$data_menu = $this->model_menu->mget_daftar_menu_byparams($indikator);
		}
		$data['data_menu'] = $data_menu;
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_editmenu', $data, TRUE);
		$data['external_footer'] = $this->load->view('ADM/header_footer_administrator/footer_validation', null, TRUE);
		$data['function_footer'] = null;
		$data['external_initialization'] = $this->load->view('ADM/header_footer_administrator/initialization_validation', null, TRUE);
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);			
	}

	public function galeri_kelola(){
		$data['judul'] = "Kelola Daftar Galeri";
		$data['panel_title'] = "Daftar Galeri";
		
		$indikator_search = $this->input->get('search', TRUE);
    	$indikator_kategori = $this->input->get('kategori', TRUE);
    	if($indikator_search){$a=array("indikator1"=>$indikator_search); $data['keyword_pencarian']=$indikator_search;}else{$a=array(); $data['keyword_pencarian']=null;}
    	if($indikator_kategori){$b=array("indikator2"=>$indikator_kategori);}else{$b=array();}
	    $indikator = array_merge($a,$b); 	
		if(empty($indikator)){
			$data_galeri = $this->model_galeri->mget_daftar_galeri();	
			$data_galeri = $this->model_galeri->mget_daftar_galeri_byparams($indikator);

		}else{
			$data_galeri = $this->model_galeri->mget_daftar_galeri_byparams($indikator);
		}
		$data['data_galeri'] = $data_galeri;
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_editgallery', $data, TRUE);
		$data['external_footer'] = $this->load->view('ADM/header_footer_administrator/footer_validation', null, TRUE);
		$data['function_footer'] = null;
		$data['external_initialization'] = $this->load->view('ADM/header_footer_administrator/initialization_validation', null, TRUE);
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);
	}

	public function denah_kelola(){
		$data['judul'] = "Kelola Denah";
		$data_galeri = $this->model_galeri->mget_daftar_galeri();
		$data['data_galeri'] = $data_galeri;	
		$data['content_page'] = $this->load->view('ADM/content_administrator/v_content_editdenah', $data, TRUE);
		$data['external_footer'] = null;
		$data['function_footer'] = $this->footer_function_maping_area();
		$data['external_initialization'] = null;
		$this->load->view('ADM/header_footer_administrator/header_administrator');
		$this->load->view('ADM/content_administrator/v_navbartop',$data);
		$this->load->view('ADM/content_administrator/v_navbar');
		$this->load->view('ADM/content_administrator/v_administratorall',$data);
		$this->load->view('ADM/header_footer_administrator/footer_administrator',$data);			
	}

	public function adm_testimage(){
		$this->load->view('ADM/content_administrator/v_testimage');
	}

	public function adm_setting(){
		return $this->load->view('ADM/content_administrator/side_content/v_content_setting', NULL, TRUE);
	}

	public function adm_notification(){
		return $this->load->view('ADM/content_administrator/side_content/v_content_notif', NULL, TRUE);
	}

	public function adm_message(){
		$data['pesan_contoh'] = "manggala raka";
		return $this->load->view('ADM/content_administrator/side_content/v_content_message', $data, TRUE);
	}

	public function adm_search(){
		return $this->load->view('ADM/content_administrator/side_content/v_content_search', NULL, TRUE);
	}

	public function adm_menubar(){
		//return $this->load->view('ADM/content_administrator/v_content_menubar', NULL, TRUE);
		return $this->load->view('ADM/content_administrator/menubar/v_menubar_webadmin', NULL, TRUE);
	}

	public function adm_example1(){
		return $this->load->view('ADM/content_administrator/v_content_example', NULL, TRUE);
	}

	public function initialization_index(){
		return $this->load->view('ADM/header_footer_administrator/initialization_index', NULL, TRUE);
	}

	public function initialization_photolist(){
		return $this->load->view('ADM/header_footer_administrator/initialization_photolist', NULL, TRUE);
	}



//////////////////////////////////////////// FUNCTION HALAMAN PROFILE TM ////////////////////////////////////////////////////////


	public function footer_function_profile(){
		$footer_texteditor = $this->load->view('ADM/header_footer_administrator/footer_texteditor', NULL, TRUE);
		$footer_function_texteditor = $this->load->view('ADM/header_footer_administrator/footer_funct_texteditor', NULL, TRUE);
		$footer = array('footer_1'=>$footer_texteditor,
						'footer_2'=>$footer_function_texteditor);
		return $footer;
	}

	public function external_function_edit_profile(){
		return $this->load->view('ADM/header_footer_administrator/footer_external_editprofile', NULL, TRUE);
	}


	public function footer_function_photolist_profile(){
		$footer_function_photolist = $this->load->view('ADM/header_footer_administrator/footer_funct_photolist', null, TRUE);
		$footer = array('footer_1'=>$footer_function_photolist);
		return $footer;
	}

	public function footer_function_multipleupload_profile(){
		$footer_uploader = $this->load->view('ADM/header_footer_administrator/footer_uploader', null, TRUE);
		$footer = array('footer_1'=>$footer_uploader);
		return $footer;		
	}

	public function footer_function_validate(){
		$footer_validate = $this->load->view('ADM/header_footer_administrator/footer_validation', null, TRUE);
		$initialization_validate = $this->load->view('ADM/header_footer_administrator/initialization_validation', null, TRUE);
		$footer = array('footer_1'=>$footer_validate,
						'footer_2'=>$initialization_validate);
		return $footer;		
	}	

	public function footer_function_maping_area(){
		$data['data_mapping'] = null;
		$footer_maping = $this->load->view('ADM/header_footer_administrator/footer_maping', null, TRUE);
		$footer_function_maping_area = $this->load->view('ADM/content_administrator/v_denah_area', $data, TRUE);
		$footer = array('footer_1'=>$footer_maping,
						'footer_2'=>$footer_function_maping_area);
		return $footer;	
	}

}

