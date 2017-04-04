<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_tm extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_profile');
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
		//redirect('administrator');
		// $report = $this->userreport->call_flashdata_report();
		// echo $report;
	}



	public function profile_activated(){
		// $profile = $this->model_profile->mget_profile_activated();
	}

	public function act_profile_baru(){
			$total_profile = $this->cek_jumlah_profile();
		if($total_profile == "0"){
			$judul = $this->input->post('judul_profile');
			$ketjudul = $this->input->post('ketjudul_profile');
			$tentang = $this->input->post('tentang_profile');
			$galeri = $this->input->post('galeri_profile');
			$telepon = $this->input->post('telp_profile');
			$info = $this->input->post('info_profile');
			$lokasi = $this->input->post('lokasi_profile');
			$gmap_lat = $this->input->post('gmap_lat_profile');
			$gmap_lng = $this->input->post('gmap_lng_profile');
			$gmap_zoom = $this->input->post('gmap_zoom_profile');

		    $background_no_id = $this->get_no_idbackground_profile();
		    $cover_id = $this->get_idbackground_profile();
		    
			// MAIN BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/background-head';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '3000';
			$config['max_width'] = '1024';
			$config['max_height'] = '1024';
			$config['overwrite'] = true;
          	$nmfile = "profile_main_".$background_no_id;
          	$config['file_name'] = $nmfile;
			$this->load->library('upload', $config, 'main_upload'); // Create custom object 
		    $this->main_upload->initialize($config);
		    $main = $this->main_upload->do_upload('background_profile');

		    // THUMB BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/background-head/bgnhead-thumbs';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '3000';
			$config['max_width'] = '1024';
			$config['max_height'] = '1024';
			$config['overwrite'] = true;
          	$nmfile = "profile_thumb_".$background_no_id;
          	$config['file_name'] = $nmfile;
			$this->load->library('upload', $config, 'thumb_upload'); // Create custom object 
		    $this->thumb_upload->initialize($config);
		    $thumb = $this->thumb_upload->do_upload('background_profile');


			  if (!$main AND !$thumb){
				$this->session->set_flashdata('error', "terjadi kesalahan saat upload");
		        redirect('administrator/profile_baru');
			  }else{
			  		$background_upload = $this->main_upload->data();
			  		$bngthumb_upload = $this->thumb_upload->data();

			  		$params_profile = array('info_judul_tm'=>$judul,
			  								'info_ketjudul_tm'=>$ketjudul,
			  								'info_cover_tm'=>$cover_id,
			  								'info_tentang_tm'=>$tentang,
			  								'info_galeri_tm'=>$galeri,
			  								'info_telepon_tm'=>$telepon,
			  								'info_tm'=>$info,
			  								'info_lokasi_tm'=>$lokasi,
			  								'gmap_lat_tm'=>$gmap_lat,
			  								'gmap_lng_tm'=>$gmap_lng,
			  								'gmap_zoom_tm'=>$gmap_zoom);

			  		$params_upload = array('id_photo'=>$params_profile['info_cover_tm'],
			  							   'filename_photo'=>$background_upload['file_name'],
			  							   'extension_photo'=>$background_upload['file_ext'],
			  							   'fullpath_photo'=>$background_upload['file_path'],
			  							   'thumb_width_photo'=>$background_upload['image_width'],
			  							   'thumb_height_photo'=>$background_upload['image_height'],
			  							   'thumb_x_photo'=>"0",
			  							   'thumb_y_photo'=>"0",
			  							   'headphoto_is_deleted'=>"0");

			  		$upload_data_profile = $this->model_profile->m_buat_profile($params_profile);
			  		$upload_data_cover_profile = $this->model_profile->m_tambah_backgrndcover_profile($params_upload);
			  		if($upload_data_profile and $upload_data_cover_profile){
						$this->session->set_flashdata('sukses', "Data Baru Berhasil Ditambahkan");
				        redirect('administrator/profile_baru');
			  		}else{
						$this->session->set_flashdata('error', "Data Baru Gagal Ditambahkan");
				        redirect('administrator/profile_baru');
			  		}

			  }

		}else{
			$this->session->set_flashdata('error', "Data Baru Gagal Ditambahkan ( Maximal 1 Profile )");
			redirect('administrator/profile_baru');
		}
	}

	public function act_profile_session(){
			$judul = $this->input->post('judul_profile');
			$ketjudul = $this->input->post('ketjudul_profile');
			$tentang = $this->input->post('tentang_profile');
			$galeri = $this->input->post('galeri_profile');
			$telepon = $this->input->post('telp_profile');
			$info = $this->input->post('info_profile');
			$lokasi = $this->input->post('lokasi_profile');
			$gmap_lat = $this->input->post('gmap_lat_profile');
			$gmap_lng = $this->input->post('gmap_lng_profile');
			$gmap_zoom = $this->input->post('gmap_zoom_profile');
			$id_profile = $this->input->post('profile_id');
			$data_array = array('info_judul_tm'=>$judul,
			  					'info_ketjudul_tm'=>$ketjudul,
			  					'info_tentang_tm'=>$tentang,
			  					'info_galeri_tm'=>$galeri,
			  					'info_telepon_tm'=>$telepon,
			  					'info_tm'=>$info,
			  					'info_lokasi_tm'=>$lokasi,
			  					'gmap_lat_tm'=>$gmap_lat,
			  					'gmap_lng_tm'=>$gmap_lng,
			  					'gmap_zoom_tm'=>$gmap_zoom,
			  					'id_profile'=>$id_profile);	
			$this->session->set_flashdata('tm_profile_session',$data_array);	
	}

	public function act_profile_edit_all(){
			$judul = $this->input->post('judul_profile');
			$ketjudul = $this->input->post('ketjudul_profile');
			$tentang = $this->input->post('tentang_profile');
			$galeri = $this->input->post('galeri_profile');
			$telepon = $this->input->post('telp_profile');
			$info = $this->input->post('info_profile');
			$lokasi = $this->input->post('lokasi_profile');
			$gmap_lat = $this->input->post('gmap_lat_profile');
			$gmap_lng = $this->input->post('gmap_lng_profile');
			$gmap_zoom = $this->input->post('gmap_zoom_profile');
			$id_profile = $this->input->post('profile_id');
			$data_array = array('info_judul_tm'=>$judul,
			  					'info_ketjudul_tm'=>$ketjudul,
			  					'info_tentang_tm'=>$tentang,
			  					'info_galeri_tm'=>$galeri,
			  					'info_telepon_tm'=>$telepon,
			  					'info_tm'=>$info,
			  					'info_lokasi_tm'=>$lokasi,
			  					'gmap_lat_tm'=>$gmap_lat,
			  					'gmap_lng_tm'=>$gmap_lng,
			  					'gmap_zoom_tm'=>$gmap_zoom,
			  					'id_profile'=>$id_profile);	
			$edit_profile = $this->model_profile->m_edit_profile($data_array);
			if($edit_profile){
				$this->session->set_flashdata('sukses', "Data Profile Tirta Mrapen Berhasil Diubah");
			}else{
				$this->session->set_flashdata('error', "Data Profile Tirta Mrapen Gagal Diubah");
			}  							
	}

	public function act_profile_photoheader_set(){
		$id_photo = $this->input->post('id_photo');
		$total_profile = $this->cek_jumlah_profile();
		if($total_profile != "1"){
			$this->session->set_flashdata('error', "Profileheader Tirta Mrapen Gagal Diubah cekjumlah profile");
			return false;
		}else{
			$profile = $this->model_profile->mget_profile_activated();
			foreach($profile->result() as $hasil){
				$id_profile = $hasil->id_profile_tm;
			}
			$set_photoheader = $this->model_profile->mset_data_photoheader($id_profile,$id_photo);
			if($set_photoheader){
				$this->session->set_flashdata('sukses', "Photoheader Tirta Mrapen Berhasil Diubah");
			}else{
				$this->session->set_flashdata('error', "Photoheader Tirta Mrapen Gagal Diubah");
			}
		}
	}


	public function act_profile_photoheader_del(){
		$id_photo = $this->input->post('id_photo');
		$total_profile = $this->cek_jumlah_profile();
		if($total_profile != "1"){
			$this->session->set_flashdata('error', "Profileheader Tirta Mrapen Gagal Diubah Cek Jumlah profile");
			return false;
		}else{
			$cek_backgroundcover_used = $this->model_profile->mcek_used_backgroundcover_profile($id_photo);
			if($cek_backgroundcover_used){
				$cek_rows = $this->model_profile->mcek_jumlah_backgroundcover_profile();
				if($cek_rows == "1"){
					$this->session->set_flashdata('error', "Profileheader Terakhir tidak bisa dihapus");	
				}else{
					$del_photoheader = $this->model_profile->mdel_data_photoheader($id_photo);
					if($del_photoheader){
						$this->session->set_flashdata('sukses', "Photoheader Tirta Mrapen Berhasil Dihapus");
					}else{
						$this->session->set_flashdata('error', "Photoheader Tirta Mrapen Gagal Dihapus");
					}
				}
			}else{
				$this->session->set_flashdata('error', "Photo Gagal Dihapus Karena Digunakan Sebagai Photoheader");
			}
		}
	}

	public function act_profile_photoheader_upload(){
		    $background_no_id = $this->get_no_idbackground_profile();
		    $cover_id = $this->get_idbackground_profile();

			// MAIN BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/background-head';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '2000';
			$config['max_width'] = '1024';
			$config['max_height'] = '1024';
			$config['overwrite'] = true;
          	$nmfile = "profile_main_".$background_no_id;
          	$config['file_name'] = $nmfile;
			$this->load->library('upload', $config, 'main_upload'); // Create custom object 
		    $this->main_upload->initialize($config);
		    $main = $this->main_upload->do_upload('background_profile');

		    // THUMB BACKGROUND
			$config = array();
	     	$config['upload_path'] = 'assets/TM_Public/img/background-head/bgnhead-thumbs';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '2000';
			$config['max_width'] = '1024';
			$config['max_height'] = '1024';
			$config['overwrite'] = true;
          	$nmfile = "profile_thumb_".$background_no_id;
          	$config['file_name'] = $nmfile;
			$this->load->library('upload', $config, 'thumb_upload'); // Create custom object 
		    $this->thumb_upload->initialize($config);
		    $thumb = $this->thumb_upload->do_upload('background_profile');		

		    if (!$main AND !$thumb){
				$this->session->set_flashdata('error', "terjadi kesalahan saat upload");
		        redirect('administrator/profile_photoheader');
			}else{
					$background_upload = $this->main_upload->data();
			  		$bngthumb_upload = $this->thumb_upload->data();


			  		$params_upload = array('id_photo'=>$cover_id,
			  							   'filename_photo'=>$background_upload['file_name'],
			  							   'extension_photo'=>$background_upload['file_ext'],
			  							   'fullpath_photo'=>$background_upload['file_path'],
			  							   'thumb_width_photo'=>$background_upload['image_width'],
			  							   'thumb_height_photo'=>$background_upload['image_height'],
			  							   'thumb_x_photo'=>"0",
			  							   'thumb_y_photo'=>"0",
			  							   'headphoto_is_deleted'=>"0");

			  		$upload_data_cover_profile = $this->model_profile->m_tambah_backgrndcover_profile($params_upload);
			  		if($upload_data_cover_profile){
						$this->session->set_flashdata('sukses', "Data Baru Berhasil Ditambahkan");
				        redirect('administrator/profile_photoheader');
			  		}else{
						$this->session->set_flashdata('error', "Data Baru Gagal Ditambahkan");
				        redirect('administrator/profile_photoheader');
			  		}			  		
			}
	}

	public function get_idbackground_profile(){
		$last_id = $this->model_profile->mget_last_backgroundcover_profile();
		$total_row = $this->model_profile->mcek_jumlah_backgroundcover_profile();
		if($total_row == 0){
			$cover_id = "BackgroundCover_1001";
			return $cover_id;
		}else if($total_row > 1){
			$last_id = $this->model_profile->mget_last_backgroundcover_profile();
			$id_akumulasi = substr($last_id,16)+1;
            $cover_id = str_pad($id_akumulasi, 20, "BackgroundCover_", STR_PAD_LEFT);
            return $cover_id;
		}else{
			return FALSE;
		}
	}

	public function get_no_idbackground_profile(){
		$last_id = $this->model_profile->mget_last_backgroundcover_profile();
		$total_row = $this->model_profile->mcek_jumlah_backgroundcover_profile();
		if($total_row == 0){
			$no_id = "1001";
			return $no_id;
		}else if($total_row > 1){
			$last_id = $this->model_profile->mget_last_backgroundcover_profile();
			$no_id = substr($last_id,16)+1;
            return $no_id;
		}else{
			return FALSE;
		}
	}

	public function cek_jumlah_profile(){
		$total_row = $this->model_profile->mcek_jumlah_profile();
		return $total_row;
	}

	public function tes_flashdata(){
		$data_profile_session = $this->session->flashdata('tm_profile_session');
		echo $data_profile_session['info_judul_tm']."</br>";
		echo $data_profile_session['info_ketjudul_tm']."</br>";
		echo $data_profile_session['info_tentang_tm']."</br>";
		echo $data_profile_session['info_galeri_tm']."</br>";
		echo $data_profile_session['info_telepon_tm']."</br>";
		echo $data_profile_session['info_tm']."</br>";
		echo $data_profile_session['info_lokasi_tm']."</br>";
		echo $data_profile_session['gmap_lat_tm']."</br>";
		echo $data_profile_session['gmap_lng_tm']."</br>";
		echo $data_profile_session['gmap_zoom_tm']."</br>";
		echo $data_profile_session['id_profile']."</br>";
		// $this->session->set_flashdata('sukses', "Product sukses di upload");
  //       redirect('administrator');
	}

}