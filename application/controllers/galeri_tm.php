<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_tm extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_galeri');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        if(!$this->userauth->cek_loggedin()){
        	redirect('login');
        }
    }

	public function index()
	{

	}

	public function act_galeri_baru(){
		$this->form_validation->set_rules('judul_tempat','nama tempat','required|is_unique[galeri_tm.judul_galeri_tm]');
		$this->form_validation->set_rules('kategori_tempat','kategori tempat','required');
		$this->form_validation->set_message('is_unique', '%s sudah ada');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        if($this->form_validation->run()==FALSE) {
            redirect('administrator/galeri_baru');
        }else{        	
		$id_galeri = $this->get_id_galeri();
		$judul_galeri = $this->input->post('judul_tempat');
		$info_galeri = $this->input->post('info_tempat');
		$kategori_galeri = $this->input->post('kategori_tempat');
		

		// uploadgaleri
		$params_upload = array('description'=>"new",
		   					   'filename' => null);
		$upload_galeri = $this->upload_foto_galeri($params_upload);



	 	if (!$upload_galeri){
			$this->session->set_flashdata('error', "terjadi kesalahan saat upload");
		    redirect('administrator/galeri_baru');
		}else{
			$params_galeri = array('id_galeri_tm'=>$id_galeri,
								 'judul_galeri_tm'=>$judul_galeri,
								 'info_galeri_tm'=>$info_galeri,
								 'kategori_galeri_tm'=>$kategori_galeri,
								 'foto_galeri_tm'=>$upload_galeri['file_name'],
								 'galeri_is_deleted'=>'no');
			$galeri_baru = $this->model_galeri->m_tambah_galeribaru($params_galeri);
			if($galeri_baru){
			$this->session->set_flashdata('sukses', "galeri "."<strong>".$judul_galeri."</strong>"." berhasil ditambahkan");
		    redirect('administrator/galeri_baru');
			}else{
			$this->session->set_flashdata('error', "galeri "."<strong>".$judul_galeri."</strong>"." gagal ditambahkan");
		    redirect('administrator/galeri_baru');
			}

		}

        }	
	}

	public function act_galeri_edit(){
		$this->form_validation->set_rules('id_galeri','ID galeri','required');
		$this->form_validation->set_rules('judul_galeri','nama galeri','required');
		$this->form_validation->set_rules('kategori_galeri','kategori galeri','required');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        if($this->form_validation->run()==FALSE) {
        	$this->session->set_flashdata('error', "terjadi kesalahan validasi data");
            redirect('administrator/galeri_kelola');
        }else{        	
		$id_galeri = $this->input->post('id_galeri');
		$judul_galeri = $this->input->post('judul_galeri');
		$kategori_galeri = $this->input->post('kategori_galeri');
		$info_galeri = $this->input->post('ket_galeri');

		$params_galeri = array('id_galeri_tm'=>$id_galeri,
								'judul_galeri_tm'=>$judul_galeri,
								'kategori_galeri_tm'=>$kategori_galeri,
								'info_galeri_tm'=>$info_galeri,
								'galeri_is_deleted'=>'no');
			$galeri_edit = $this->model_galeri->m_edit_galeri($params_galeri);
			if($galeri_edit){
				$this->session->set_flashdata('sukses', "galeri "."<strong>".$judul_galeri."</strong>"." berhasil diedit");
			    redirect('administrator/galeri_kelola');
			}else{
				$this->session->set_flashdata('error', "galeri "."<strong>".$judulgaleri."</strong>"." gagal diedit");
			    redirect('administrator/galeri_kelola');
			}
		}		
	}

	public function act_fotogaleri_edit(){
		$this->form_validation->set_rules('id_galeri','ID galeri','required');
        if($this->form_validation->run()==FALSE) {
        	$this->session->set_flashdata('error', "terjadi kesalahan pada ID galeri");
            redirect('administrator/galeri_kelola');
        }else{ 
        $id_galeri = $this->input->post('id_galeri');
        $get_id_fotogaleri = $this->model_galeri->mget_id_fotogaleri($id_galeri);
	        if($get_id_fotogaleri){
				$params_upload = array('description'=>"edit",
				   					   'filename' => $get_id_fotogaleri);
				$upload_fotogaleri = $this->upload_foto_galeri($params_upload);
				if($upload_fotogaleri){	
					$this->session->set_flashdata('sukses', "foto berhasil diperbaharui");
					redirect('administrator/galeri_kelola');	
				}else{
					$this->session->set_flashdata('error', "foto gagal diperbaharui, periksa ukuran foto");
					redirect('administrator/galeri_kelola');	
				}
			}else{
				$this->session->set_flashdata('error', "id fotogaleri tidak ditemukan");
				redirect('administrator/galeri_kelola');	
			}
		}
	}

	public function act_denah(){
		$this->form_validation->set_rules('nama_denah','nama denah','required');
		$this->form_validation->set_rules('nama_galeri','nama galeri','required');
		 if($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('error', "periksa kembali data denah");
            redirect('administrator/denah_kelola');
        }else{   
        	$id_denah = $this->input->post('nama_denah');
			$judul_denah = $this->input->post('nama_galeri');

			$jumlah_id_denah = $this->model_galeri->mcek_jumlah_denah($id_denah);
			if($jumlah_id_denah == 0){
				//create
				$denah_baru = $this->model_galeri->m_tambah_denah($id_denah,$judul_denah);
				if($denah_baru){
					$this->session->set_flashdata('sukses', "Denah Berhasil Ditambah");
				}else{
					$this->session->set_flashdata('error', "Denah Gagal");
				}
			}else if($jumlah_id_denah == 1){
				//update
				$denah_edit = $this->model_galeri->m_edit_denah($id_denah,$judul_denah);
				if($denah_edit){
					$this->session->set_flashdata('sukses', "Denah Berhasil Diedit");
				}else{
					$this->session->set_flashdata('sukses', "Denah Gagal Diedit");
				}
			}else{
				//wrong
				$this->session->set_flashdata('error', "ditemukan id_denah ganda ".$id_denah.", periksa kembali database");
			}
			redirect('administrator/denah_kelola');
		}
	}



	public function upload_foto_galeri($params_upload){
		  
		  if($params_upload['description'] == "new"){			
			$image_number= $this->get_no_idgaleri();
          	$nmfile = "photo_galeri_".$image_number;
          }else{
          	$nmfile = $params_upload['filename'];
          }
		// MAIN BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/galeri_tm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '3000';
			$config['max_width'] = '1024';
			$config['max_height'] = '1024';
			$config['overwrite'] = true;
          	$config['file_name'] = $nmfile;
			$this->load->library('upload', $config, 'main_upload'); // Create custom object 
		    $this->main_upload->initialize($config);
		    $main = $this->main_upload->do_upload('background_profile');


	 	if (!$main){
			return false;
		}else{
			$background_upload = $this->main_upload->data();
			return $background_upload;
		}	
	}

	public function get_id_galeri(){
		$total_row = $this->model_galeri->mcek_jumlah_galeri();
		if($total_row < 1){
			$cover_id = "galeri_1001";
			return $cover_id;
		}else{
			$last_id = $this->model_galeri->mget_last_galeri();
			$id_akumulasi = substr($last_id,7)+1;
            $cover_id = str_pad($id_akumulasi, 11, "galeri_", STR_PAD_LEFT);
            return $cover_id;
		}
	}

	public function get_no_idgaleri(){
		$last_id = $this->model_galeri->mget_last_galeri();
		$total_row = $this->model_galeri->mcek_jumlah_galeri();
		if($total_row < 1){
			$no_id = "1001";
			return $no_id;
		}else{
			$last_id = $this->model_galeri->mget_last_galeri();
			$no_id = substr($last_id,7)+1;
            return $no_id;
		}
	}

	public function testing(){
   $search = $this->input->get('search');
    echo $search;

    $kategori = $this->input->get('kategori');
    echo $kategori;

	}


}