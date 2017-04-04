<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_tm extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_menu');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        if(!$this->userauth->cek_loggedin()){
        	redirect('login');
        }

  //       if (function_exists('photomenu_include_or_skip')) {
		//     echo "IMAP functions are available.<br />\n";
		// } else {
		//     echo "IMAP functions are not available.<br />\n";
		// }


    }

	public function index()
	{
		redirect('administrator');
	}

	/*public function act_menu_baru(){
		$this->form_validation->set_rules('nama_menu','nama menu','required|is_unique[menu_tm.nama_menu_tm]');
		$this->form_validation->set_rules('jenis_menu','jenis menu','required');
		$this->form_validation->set_rules('kategori_menu','kategori menu','required');
		$this->form_validation->set_rules('harga_menu','harga menu','required|min_length[4]|is_natural_no_zero');
		$this->form_validation->set_rules('ket_menu','keterangan menu','required');	
		$this->form_validation->set_message('is_unique', '%s sudah ada');
        $this->form_validation->set_message('is_natural_no_zero', '%s harus bilangan real atau asli');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        if($this->form_validation->run()==FALSE) {
            redirect('administrator/menu_baru');
        }else{        	
		$id_menu = $this->get_id_menu();
		$nama_menu = $this->input->post('nama_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$kategori_menu = $this->input->post('kategori_menu');
		$harga_menu = $this->input->post('harga_menu');
		$ket_menu = $this->input->post('ket_menu');
		

		// uploadmenu
		$params_upload = array('description'=>"new",
		   					   'filename' => null);
		$upload_menu = $this->upload_foto_menu($params_upload);



	 	if (!$upload_menu){
			$this->session->set_flashdata('error', "terjadi kesalahan saat upload");
		    redirect('administrator/menu_baru');
		}else{
			$params_menu = array('id_menu_tm'=>$id_menu,
								 'nama_menu_tm'=>$nama_menu,
								 'harga_menu_tm'=>$harga_menu,
								 'info_menu_tm'=>$ket_menu,
								 'jenis_menu_tm'=>$jenis_menu,
								 'kategori_menu_tm'=>$kategori_menu,
								 'foto_menu_tm'=>$upload_menu['file_name'],
								 'menu_is_deleted'=>'no');
			$menu_baru = $this->model_menu->m_tambah_menubaru($params_menu);
			if($menu_baru){
			$this->session->set_flashdata('sukses', "menu "."<strong>".$nama_menu."</strong>"." berhasil ditambahkan");
		    redirect('administrator/menu_baru');
			}else{
			$this->session->set_flashdata('error', "menu "."<strong>".$nama_menu."</strong>"." gagal ditambahkan");
		    redirect('administrator/menu_baru');
			}

		}

        }	
	}*/

	public function act_menu_baru(){
		$this->form_validation->set_rules('nama_menu','nama menu','required|is_unique[menu_tm.nama_menu_tm]');
		$this->form_validation->set_rules('jenis_menu','jenis menu','required');
		$this->form_validation->set_rules('kategori_menu','kategori menu','required');
		$this->form_validation->set_rules('harga_menu','harga menu','required|min_length[4]|is_natural_no_zero');
	//	$this->form_validation->set_rules('ket_menu','keterangan menu','required');	
		$this->form_validation->set_message('is_unique', '%s sudah ada');
        $this->form_validation->set_message('is_natural_no_zero', '%s harus bilangan real atau asli');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        if($this->form_validation->run()==FALSE) {
            redirect('administrator/menu_baru');
        }else{        	
		$id_menu = $this->get_id_menu();
		$nama_menu = $this->input->post('nama_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$kategori_menu = $this->input->post('kategori_menu');
		$harga_menu = $this->input->post('harga_menu');
		$ket_menu = $this->input->post('ket_menu');
		
		$params_menu = array('id_menu_tm'=>$id_menu,
							 'nama_menu_tm'=>$nama_menu,
							 'harga_menu_tm'=>$harga_menu,
							 'info_menu_tm'=>$ket_menu,
							 'jenis_menu_tm'=>$jenis_menu,
							 'kategori_menu_tm'=>$kategori_menu,
							 'foto_menu_tm'=>"default_menupic.jpg",
							 'menu_is_deleted'=>'no');


		// // uploadmenu
		// $params_upload = array('description'=>"new",
		//    					   'filename' => null);
		// $upload_menu = $this->upload_foto_menu($params_upload);
		$menu_baru = $this->model_menu->m_tambah_menubaru($params_menu);

		if($menu_baru){
			$this->session->set_userdata('id_menu_tm',$id_menu);
			$this->session->set_userdata('nama_menu_tm',$nama_menu);
			redirect('administrator/photomenu_upload_or_skip');
		}else{
			$this->session->set_flashdata('error', "menu "."<strong>".$nama_menu."</strong>"." gagal ditambahkan");
		    redirect('administrator/menu_baru');
		}


	 // 	if (!$upload_menu){
		// 	$this->session->set_flashdata('error', "terjadi kesalahan saat upload");
		//     redirect('administrator/menu_baru');
		// }else{
		// 	$params_menu = array('id_menu_tm'=>$id_menu,
		// 						 'nama_menu_tm'=>$nama_menu,
		// 						 'harga_menu_tm'=>$harga_menu,
		// 						 'info_menu_tm'=>$ket_menu,
		// 						 'jenis_menu_tm'=>$jenis_menu,
		// 						 'kategori_menu_tm'=>$kategori_menu,
		// 						 'foto_menu_tm'=>$upload_menu['file_name'],
		// 						 'menu_is_deleted'=>'no');
		// 	$menu_baru = $this->model_menu->m_tambah_menubaru($params_menu);
		// 	if($menu_baru){
		// 	$this->session->set_flashdata('sukses', "menu "."<strong>".$nama_menu."</strong>"." berhasil ditambahkan");
		//     redirect('administrator/menu_baru');
		// 	}else{
		// 	$this->session->set_flashdata('error', "menu "."<strong>".$nama_menu."</strong>"." gagal ditambahkan");
		//     redirect('administrator/menu_baru');
		// 	}

		// }

        }	
	}



	public function photomenu_skip(){

	}



	public function act_menu_edit(){
		$this->form_validation->set_rules('id_menu','ID menu','required');
		$this->form_validation->set_rules('nama_menu','nama menu','required');
		$this->form_validation->set_rules('jenis_menu','jenis menu','required');
		$this->form_validation->set_rules('kategori_menu','kategori menu','required');
		$this->form_validation->set_rules('harga_menu','harga menu','required|min_length[4]|is_natural_no_zero');
		$this->form_validation->set_rules('ket_menu','keterangan menu','required');	
		$this->form_validation->set_message('is_unique', '%s sudah ada');
        $this->form_validation->set_message('is_natural_no_zero', '%s harus bilangan real atau asli');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        if($this->form_validation->run()==FALSE) {
        	$this->session->set_flashdata('error', "terjadi kesalahan validasi data");
            redirect('administrator/menu_kelola');
        }else{        	
		$id_menu = $this->input->post('id_menu');
		$nama_menu = $this->input->post('nama_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$kategori_menu = $this->input->post('kategori_menu');
		$harga_menu = $this->input->post('harga_menu');
		$ket_menu = $this->input->post('ket_menu');

		$params_menu = array('id_menu_tm'=>$id_menu,
								 'nama_menu_tm'=>$nama_menu,
								 'harga_menu_tm'=>$harga_menu,
								 'info_menu_tm'=>$ket_menu,
								 'jenis_menu_tm'=>$jenis_menu,
								 'kategori_menu_tm'=>$kategori_menu,
								 'menu_is_deleted'=>'no');
			$menu_edit = $this->model_menu->m_edit_menu($params_menu);
			if($menu_edit){
				$this->session->set_flashdata('sukses', "menu "."<strong>".$nama_menu."</strong>"." berhasil diedit");
			    redirect('administrator/menu_kelola');
			}else{
				$this->session->set_flashdata('error', "menu "."<strong>".$nama_menu."</strong>"." gagal diedit");
			    redirect('administrator/menu_kelola');
			}
		}		
	}

	public function act_photomenu_upload_or_skip(){
		$this->form_validation->set_rules('id_menu','ID menu','required');
        if($this->form_validation->run()==FALSE) {
        	$this->session->set_flashdata('error', "terjadi kesalahan pada ID Menu");
            redirect('administrator/menu_baru');
        }else{ 
        $id_menu = $this->input->post('id_menu');
        $get_number = substr($id_menu,5);
        $filename = "foodpic_".$get_number;
        $get_id_fotomenu = $this->model_menu->mget_id_fotomenu($id_menu);
	        if($get_id_fotomenu){
				$params_upload = array('description'=>"edit",
				   					   'filename' => $filename);
				$upload_fotomenu = $this->upload_foto_menu($params_upload);
				$full_filename = $filename.$upload_fotomenu['file_ext'];
				$update_foto = $this->model_menu->mupdate_filename_fotomenu($id_menu,$full_filename);
				if($upload_fotomenu and $update_foto){	
					$this->session->set_flashdata('sukses', "Menu Sukses Ditambahkan");
					redirect('administrator/menu_baru');
				}else{
					$this->session->set_flashdata('error', "Terjadi Kesalahan Memperbaharui foto Menu");
					redirect('administrator/menu_baru');
				}
			}else{
				$this->session->set_flashdata('error', "id fotomenu tidak ditemukan");
				redirect('administrator/menu_baru');
			}
		}		
	}

	public function act_fotomenu_edit(){
		$this->form_validation->set_rules('id_menu','ID menu','required');
        if($this->form_validation->run()==FALSE) {
        	$this->session->set_flashdata('error', "terjadi kesalahan pada ID Menu");
            redirect('administrator/menu_kelola');
        }else{ 
        $id_menu = $this->input->post('id_menu');
        $get_id_fotomenu = $this->model_menu->mget_id_fotomenu($id_menu);
	        if($get_id_fotomenu){
				$params_upload = array('description'=>"edit",
				   					   'filename' => $get_id_fotomenu);
				$upload_fotomenu = $this->upload_foto_menu($params_upload);
				if($upload_fotomenu){	
					$this->session->set_flashdata('sukses', "foto berhasil diperbaharui");
					redirect('administrator/menu_kelola');	
				}else{
					$this->session->set_flashdata('error', "foto gagal diperbaharui cek id fotomenu");
					redirect('administrator/menu_kelola');	
				}
			}else{
				$this->session->set_flashdata('error', "id fotomenu tidak ditemukan");
				redirect('administrator/menu_kelola');	
			}
		}
	}


	public function upload_foto_menu($params_upload){
		  
		  if($params_upload['description'] == "new"){			
			$image_number= $this->get_no_idmenu();
          	$nmfile = "foodpic_".$image_number;
          }else{
          	$nmfile = $params_upload['filename'];
          }
		// MAIN BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/menu_tm';
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

	public function get_id_menu(){
		$total_row = $this->model_menu->mcek_jumlah_menu();
		if($total_row < 1){
			$cover_id = "menu_1001";
			return $cover_id;
		}else{
			$last_id = $this->model_menu->mget_last_menu();
			$id_akumulasi = substr($last_id,5)+1;
            $cover_id = str_pad($id_akumulasi, 9, "menu_", STR_PAD_LEFT);
            return $cover_id;
		}
	}

	public function get_no_idmenu(){
		$last_id = $this->model_menu->mget_last_menu();
		$total_row = $this->model_menu->mcek_jumlah_menu();
		if($total_row < 1){
			$no_id = "1001";
			return $no_id;
		}else{
			$last_id = $this->model_menu->mget_last_menu();
			$no_id = substr($last_id,5)+1;
            return $no_id;
		}
	}

	public function getQueryStringParams() {
	    parse_str($_SERVER['QUERY_STRING'], $params);
	    return $params;
	}	

	public function testing(){
   $search = $this->input->get('search');
    echo $search;

    $kategori = $this->input->get('kategori');
    echo $kategori;



		// $last_id = $this->model_menu->mget_last_menu();
		// echo $last_id;

		// $id_menu = $this->get_id_menu();
		// echo $id_menu;

		// $id_menu1 = $this->get_no_idmenu();
		// echo $id_menu1;
	}


}