<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('model_frontend');
        $this->load->model('model_menu');
        $this->load->model('model_galeri');
        $this->data = $this->default_attribute_website();     
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
		$data = $this->data;
		$data['judul_page'] = "Tirta Mrapen";
		$data['judul_page_1'] = "Tentang Kita";
		$data['judul_page_2'] = "Galeri";
		$data['judul_page_3'] = "Daftar Menu";
		$data['judul_page_4'] = "Lokasi & Reservasi";
		$data['ketjudul_page_1'] = "Deskripsi Singkat Tirta Mrapen";
		$data['ketjudul_page_2'] = "Deskripsi Singkat Mengenai Tempat dan Fasilitas yang Tersedia";
		$data['ketjudul_page_3'] = "Deskripsi Singkat Menu yang Tersedia";
		$data['ketjudul_page_4'] = "Deskripsi Informasi Alamat dan Kontak Reservasi";
		$data['mainjs_def'] = $this->main_js();
		$data['denah'] = $this->maping_area();
		$data['preview_menu'] = $this->preview_menu();
		$data['preview_galeri'] = $this->preview_galeri();
		$this->load->view('TM_VIEW/header_footer/header_public',$data);
		$this->load->view('TM_VIEW/content/v_public_content',$data);
		$this->load->view('TM_VIEW/header_footer/footer_public',$data);

	}

	public function website_preview(){
		$data['content_preview'] = $this->set_attribute_session_flashdata();
		$data['judul_page'] = "Tirta Mrapen Preview";
		$data['judul_page_1'] = "Tentang Kita";
		$data['judul_page_2'] = "Galeri";
		$data['judul_page_3'] = "Daftar Menu";
		$data['judul_page_4'] = "Lokasi & Reservasi";
		$data['ketjudul_page_1'] = "Deskripsi Singkat Tirta Mrapen";
		$data['ketjudul_page_2'] = "Deskripsi Singkat Mengenai Tempat dan Fasilitas yang Tersedia";
		$data['ketjudul_page_3'] = "Deskripsi Singkat Menu yang Tersedia";
		$data['ketjudul_page_4'] = "Deskripsi Informasi Alamat dan Kontak Reservasi";		
		$data['mainjs_def'] = $this->main_js();
		$data['denah'] = $this->maping_area();
		$data['preview_menu'] = null;
		$data['preview_galeri'] = null;
		$this->load->view('TM_VIEW/header_footer/header_public',$data);
		$this->load->view('TM_VIEW/content/v_allcontent_preview',$data);
		$this->load->view('TM_VIEW/header_footer/footer_public',$data);	
	}

	public  function default_attribute_website(){
		$attribute_by_db = $this->model_frontend->mget_all_atribute();
		if(!$attribute_by_db){
			$set_by_default = $this->set_attribute_default();
			return $set_by_default;
		}else{
			foreach($attribute_by_db->result() as $hasil){
				$judul = $hasil->info_judul_tm;
				$ketjudul =  $hasil->info_ketjudul_tm;
				$tentang =  $hasil->info_tentang_tm;
				$galeri =  $hasil->info_galeri_tm;
				$telepon =  $hasil->info_telepon_tm;
				$info = $hasil->info_tm;
				$lokasi = $hasil->info_lokasi_tm;
				$gmap_lat = $hasil->gmap_lat_tm;
				$gmap_lng = $hasil->gmap_lng_tm;
				$gmap_zoom = $hasil->gmap_zoom_tm;
				$filename = $hasil->filename_photo;
				$extension = $hasil->extension_photo;
			}
				

 		$set_by_default = array('info_judul_tm'=>$judul,
			  				'info_ketjudul_tm'=>$ketjudul,
			  				'info_tentang_tm'=>$tentang,
			  				'info_galeri_tm'=>$galeri,
			  				'info_telepon_tm'=>$telepon,
			  				'info_tm'=>$info,
			  				'info_lokasi_tm'=>$lokasi,
			  				'info_map_lat'=>$gmap_lat,
			  				'info_map_lng'=>$gmap_lng,
			  				'info_map_zoom'=>$gmap_zoom,
			  				'filename_photo'=>$filename,
			  				'extension_photo'=>$extension);  
			return $set_by_default;
		}
	}

	public function set_attribute_default(){
		$judul = "Tirta Mrapen";
		$ketjudul = "Ikan Bakar dan Pemancingan";	
		$tentang = "Tirta Mrapen merupakan rumah makan dengan konsep outdoor berciri khas Jawa dengan view yang menarik. Ditambah adanya kolam ikan disekitar lesehan serta gazebo diatas kolam ikan air mengalir. Tempat kami representative untuk bertemu relasi/ rekan bisnis, meeting, ulangtahun, arisan keluarga, dll Kami menyediakan aneka menu ikan bakar dan menu masakan lainnya.";
		$galeri = "Tirta Mrapen dengan setting lesehan menyediakan tempat untuk anda yang ingin bersantai dengan keluarga, arisan keluarga, acara kantor, makan bareng, bertemu rekan bisnis/relasi,reuni bahkan meeting. Area Teras merupakan Lesehan yang bisa menampung sampai dengan 60 orang, berada pada bagian depan Pemancingan. ";
		$telepon = "+6285866353888 - Ibu Lili";
		$info = "Senin - Minggu buka : 08.00 - 17.00";
		$lokasi = "Jl. Sawangan KM 2 Ds. Tapen Kel. Pagersari Kec. Mungkid Kab. Magelang, Central Java, Indonesia</br>
					<h6> <i>  ( Dari Magelang ambil arah menuju Jogja, sampai daerah <B> Blabak </B> belok kiri ambil arah menuju <B> Ketep </B> , ikuti jalan kurang lebih 2km ) <i></h6>";
		$gmap_lat = "-7.547943";
		$gmap_lng = "110.268922";
		$gmap_zoom = "14";
		$filename = "cover_default.jpeg";
		$extension = ".jpeg";



		$atribute =   array('info_judul_tm'=>$judul,
			  				'info_ketjudul_tm'=>$ketjudul,
			  				'info_tentang_tm'=>$tentang,
			  				'info_galeri_tm'=>$galeri,
			  				'info_telepon_tm'=>$telepon,
			  				'info_tm'=>$info,
			  				'info_lokasi_tm'=>$lokasi,
			  				'info_map_lat'=>$gmap_lat,
			  				'info_map_lng'=>$gmap_lng,
			  				'info_map_zoom'=>$gmap_zoom,
			  				'filename_photo'=>$filename,
			  				'extension_photo'=>$extension);  

		return $atribute;
	}


	public function set_attribute_session_flashdata(){
		$data_profile_session = $this->session->flashdata('tm_profile_session');
		$judul = $data_profile_session['info_judul_tm'];
		$ketjudul = $data_profile_session['info_ketjudul_tm'];	
		$tentang = $data_profile_session['info_tentang_tm'];
		$galeri = $data_profile_session['info_galeri_tm'];
		$telepon = $data_profile_session['info_telepon_tm'];
		$info = $data_profile_session['info_tm'];
		$lokasi = $data_profile_session['info_lokasi_tm'];
		$gmap_lat = $data_profile_session['gmap_lat_tm'];
		$gmap_lng = $data_profile_session['gmap_lng_tm'];
		$gmap_zoom = $data_profile_session['gmap_zoom_tm'];
		
		//CEK POTO
		$attribute_by_db = $this->model_frontend->mget_all_atribute();
		if(!$attribute_by_db){
			$set_by_default = $this->set_attribute_default();
			$filename = $set_by_default['filename_photo'];
		}else{
			foreach($attribute_by_db->result() as $hasil){
			$filename = $hasil->filename_photo;
			}	
		}	

		$atribute =   array('preview_info_judul_tm'=>$judul,
			  				'preview_info_ketjudul_tm'=>$ketjudul,
			  				'preview_info_tentang_tm'=>$tentang,
			  				'preview_info_galeri_tm'=>$galeri,
			  				'preview_info_telepon_tm'=>$telepon,
			  				'preview_info_tm'=>$info,
			  				'preview_info_lokasi_tm'=>$lokasi,
			  				'preview_info_map_lat'=>$gmap_lat,
			  				'preview_info_map_lng'=>$gmap_lng,
			  				'preview_info_map_zoom'=>$gmap_zoom,
			  				'preview_filename_photo'=>$filename);  

		return $atribute;		
	}


	public function maping_area(){
		$data['data_mapping'] = null;
		return $this->load->view('TM_VIEW/content/v_maping_area', $data, TRUE);
	}

	public function main_js(){
		$data['data_main'] = null;
		return $this->load->view('TM_VIEW/header_footer/footer_homepage_main', $data, TRUE);
	}

	public function menugaleri_main_js(){
		$data['data_main'] = null;
		return $this->load->view('TM_VIEW/header_footer/footer_menu_galeri', $data, TRUE);
	}

	public function background_header_tirtamrapen(){
		$data = $this->data;
		return $this->load->view('TM_VIEW/content/v_background_header',$data);		
	}
	

	public function preview_menu(){
		$conf_paging = $this->configuration_menu_paging();
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
		$data['conf_paging_menu'] = $conf_paging;
		$data['data_menu'] = $data_menu;
		return $this->load->view('TM_VIEW/content/v_preview_menu', $data, TRUE);
	}


	public function preview_galeri(){
		$conf_paging = $this->configuration_galeri_paging();
		$indikator_search = $this->input->get('search', TRUE);
    	$indikator_kategori = $this->input->get('kategori', TRUE);
    	if($indikator_search){$a=array("indikator1"=>$indikator_search); $data['keyword_pencarian']=$indikator_search;}else{$a=array(); $data['keyword_pencarian']=null;}
    	if($indikator_kategori){$b=array("indikator2"=>$indikator_kategori);}else{$b=array();}
	    $indikator = array_merge($a,$b); 	
		if(empty($indikator)){
			$data_galeri = $this->model_galeri->mget_daftar_galeri();	
		}else{
			$data_galeri = $this->model_galeri->mget_daftar_galeri_byparams($indikator);
		}
		$data['conf_paging_galeri'] = $conf_paging;
		$data['data_galeri'] = $data_galeri;
		return $this->load->view('TM_VIEW/content/v_preview_galeri', $data, TRUE);
	}

	public function menu_paging_search(){
		$conf_paging = $this->configuration_menu_paging();
		$indikator_search = $this->input->post('search', TRUE);
    	$indikator_kategori = $this->input->post('kategori', TRUE);
    	if($indikator_search){$a=array("indikator1"=>$indikator_search); $data['keyword_pencarian']=$indikator_search;}else{$a=array(); $data['keyword_pencarian']=null;}
    	if($indikator_kategori){$b=array("indikator2"=>$indikator_kategori);}else{$b=array();}
    	$indikator = array_merge($a,$b);	

		$offset = $this->input->post('offset');
		$max = $this->input->post('max'); 
		if(empty($offset)){$offset = $conf_paging[0]['offset'];}
		if(empty($max)){$max = $conf_paging[0]['jumlah'];}
		
		if(empty($indikator)){
			if(empty($offset) and empty($max)){
				$getmenu = $this->model_menu->mget_daftar_menu();
				$indikator = false;		
			}else{
				$getmenu = $this->model_menu->mget_page_daftar_menu($offset,$max);
				$indikator = false;						
			}
		}else{
			$getmenu = $this->model_menu->mget_daftar_menu_byparams($indikator);
			$indikator = true;	
		}

			$data['data_menu'] = $getmenu;
			$data['indikator'] = $indikator;
			$data['indikator_search'] = $indikator_search;
			echo $this->load->view('TM_VIEW/content/v_preview_menu_bypage', $data, TRUE);				
	}

	public function galeri_paging_search(){
		$conf_paging = $this->configuration_galeri_paging();
		$indikator_search = $this->input->post('search', TRUE);
    	$indikator_kategori = $this->input->post('kategori', TRUE);
    	if($indikator_search){$a=array("indikator1"=>$indikator_search); $data['keyword_pencarian']=$indikator_search;}else{$a=array(); $data['keyword_pencarian']=null;}
    	if($indikator_kategori){$b=array("indikator2"=>$indikator_kategori);}else{$b=array();}
    	$indikator = array_merge($a,$b);	

		$offset = $this->input->post('offset');
		$max = $this->input->post('max'); 
		if(empty($offset)){$offset = $conf_paging[0]['offset'];}
		if(empty($max)){$max = $conf_paging[0]['jumlah'];}
		
		if(empty($indikator)){
			if(empty($offset) and empty($max)){
				$data_galeri = $this->model_galeri->mget_daftar_galeri();
				$indikator = false;		
			}else{
				$data_galeri = $this->model_galeri->mget_page_daftar_galeri($offset,$max);
				$indikator = false;						
			}
		}else{
			$data_galeri = $this->model_galeri->mget_daftar_galeri_byparams($indikator);
			$indikator = true;	
		}

			$data['data_galeri'] = $data_galeri;
			$data['indikator'] = $indikator;
			$data['indikator_search'] = $indikator_search;
			echo $this->load->view('TM_VIEW/content/v_preview_galeri_bypage', $data, TRUE);				
	}

	public function preview_map_google(){
		$data=null;
		echo $this->load->view('TM_VIEW/content/v_preview_map', $data, TRUE);
	}


	public function get_menu_modal(){
		if (!$this->input->is_ajax_request()) {
		   redirect('home');
		}else{
		$id_menu = $this->input->post('id_menu');
		$this->session->set_userdata('sess_id_menu',$id_menu);
		$data_sess = $this->session->userdata('sess_id_menu');
			if(empty($data_sess)){
				return false;
		   		redirect('home');
			}else{
				$data_menu = $this->model_menu->mget_datamenu_bymodal($id_menu);
				if(!$data_menu){
					return false;
		   			redirect('home');
				}else{
					foreach($data_menu->result() as $hasil){
					$data_modal = array('nama_menu'=>$hasil->nama_menu_tm,
										'info_menu'=>$hasil->info_menu_tm,
										'jenis_menu'=>$hasil->jenis_menu_tm,
										'foto_menu'=>$hasil->foto_menu_tm);
					}
					$this->session->unset_userdata('sess_id_menu');
					echo json_encode($data_modal);				}
			}

		}		
	}


	public function configuration_menu_paging(){
		$total_ditampilkan = 8;
		$total_page_per_paging = 3;
		$jumlah_menu = $this->model_menu->mcek_jumlah_menu();
			for($a=0; $a<=$jumlah_menu; $a++){
				$total = $total_ditampilkan*$a;
				$sementara[$a] = $total;
				if($sementara[$a]<=$jumlah_menu){
					// echo $sementara[$a]."</br>";
					 $data_array[$a] = array( 'quarter'=>$a+1,
					 						  'offset'=>$total_ditampilkan,
					 						  'jumlah'=>$sementara[$a]);
				}
			}
		$jumlah_data_array = count($data_array);
		$int_last_data_array = intval($jumlah_data_array)-1;

		if($data_array[$int_last_data_array]['jumlah'] == $jumlah_menu){
			unset($data_array[$int_last_data_array]);
		}
		return $data_array;
	}

	public function configuration_galeri_paging(){
		$total_ditampilkan = 8;
		$total_page_per_paging = 3;
		$jumlah_galeri = $this->model_galeri->mcek_jumlah_galeri();
			for($a=0; $a<=$jumlah_galeri; $a++){
				$total = $total_ditampilkan*$a;
				$sementara[$a] = $total;
				if($sementara[$a]<=$jumlah_galeri){
					// echo $sementara[$a]."</br>";
					 $data_array[$a] = array( 'quarter'=>$a+1,
					 						  'offset'=>$total_ditampilkan,
					 						  'jumlah'=>$sementara[$a]);
				}
			}
		$jumlah_data_array = count($data_array);
		$int_last_data_array = intval($jumlah_data_array)-1;

		if($data_array[$int_last_data_array]['jumlah'] == $jumlah_galeri){
			unset($data_array[$int_last_data_array]);
		}
		return $data_array;
	}	


	public function cek_denah_exist_ajax(){
		if (!$this->input->is_ajax_request()) {
		redirect('home');
		}else{	
			$id = $this->input->post('post_tempat');
			$this->session->set_userdata('sess_id_denah',$id);
			$data_sess = $this->session->userdata('sess_id_denah');
			if(empty($data_sess)){
				return false;
				redirect('home');
			}else{
				$cek_denah_exist = $this->model_galeri->mcek_jumlah_denah($data_sess);
				if($cek_denah_exist == 1){
					$get_data_denah = $this->model_galeri->mget_data_denah($data_sess);
					if($get_data_denah){
						foreach($get_data_denah->result() as $hasil){
							$data_modal = array('nama_denah'=>$hasil->id_denah_tm,
												'judul_denah'=>$hasil->judul_galeri_tm,
												'info_denah'=>$hasil->info_galeri_tm,
												'photo_denah'=>$hasil->foto_galeri_tm);
						}
						$this->session->unset_userdata('sess_id_denah');
						echo json_encode($data_modal);		
					}else{
						return false;
						redirect('home');
					}					
				}else{
					return false;
					redirect('home');
				}
			}
		}
	}

	public function cek_session(){
				$data_sess = $this->session->userdata('sess_id_denah');
		echo json_encode($data_sess);	
	}

}
