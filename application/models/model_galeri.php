<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_galeri extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function mget_last_galeri(){
        $this->db->select('id_galeri_tm');
        $this->db->from('galeri_tm');
        $this->db->order_by('id_galeri_tm','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_galeri_tm;
            }
            return $id;
        }
    } 

    public function mcek_jumlah_galeri(){
        $this->db->select('*');
        $this->db->from('galeri_tm');
        $query = $this->db->get();
        return $query->num_rows();
    }  

	public function m_tambah_galeribaru($params){
         $this->db->set('id_galeri_tm',$params['id_galeri_tm']);
         $this->db->set('judul_galeri_tm',$params['judul_galeri_tm']);
         $this->db->set('info_galeri_tm',$params['info_galeri_tm']);
         $this->db->set('kategori_galeri_tm',$params['kategori_galeri_tm']);
         $this->db->set('foto_galeri_tm',$params['foto_galeri_tm']);         
         $this->db->set('galeri_is_deleted',$params['galeri_is_deleted']);
         return $this->db->insert('galeri_tm');
    } 

	public function m_edit_galeri($params){
         $this->db->set('judul_galeri_tm',$params['judul_galeri_tm']);
         $this->db->set('kategori_galeri_tm',$params['kategori_galeri_tm']);
         $this->db->set('info_galeri_tm',$params['info_galeri_tm']);
         $this->db->set('galeri_is_deleted',$params['galeri_is_deleted']);
         $this->db->where('id_galeri_tm',$params['id_galeri_tm']);	
         return $this->db->update('galeri_tm'); 	
	}    

    public function mget_daftar_galeri(){
		$this->db->select('*');
        $this->db->from('galeri_tm');
        $this->db->where('galeri_is_deleted','no');
        $this->db->order_by('kategori_galeri_tm','desc');
        $this->db->order_by('judul_galeri_tm','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }    	
    } 

    public function mget_id_fotogaleri($id_galeri){
        $this->db->select('foto_galeri_tm');
        $this->db->from('galeri_tm');
        $this->db->where('id_galeri_tm',$id_galeri); 
        $query = $this->db->get();      
        if($query->num_rows() > 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id_fotogaleri = $hasil->foto_galeri_tm;
            }
            return $id_fotogaleri;
        }   
    }  


    public function mget_daftar_galeri_byparams($params){
    	$this->db->select('*');
        $this->db->from('galeri_tm');
        $this->db->where('galeri_is_deleted','no');

    	//cek array exist
    	if(array_key_exists("indikator1",$params) and array_key_exists("indikator2",$params)){		
    		$parameter1 = $params['indikator1'];
    		$parameter2 = $params['indikator2'];
	    	$this->db->where('kategori_galeri_tm',$parameter2);
	    	$this->db->like('judul_galeri_tm',$parameter1);
    	}else if(array_key_exists("indikator1",$params)){
	    	$parameter1 = $params['indikator1'];
	    	$this->db->like('judul_galeri_tm',$parameter1);
    	}else if(array_key_exists("indikator2",$params)){
	    	$parameter2 = $params['indikator2'];
	    	$this->db->where('kategori_galeri_tm',$parameter2);
    	} 
        $this->db->order_by('kategori_galeri_tm','desc');
    	$this->db->order_by('judul_galeri_tm','asc');

    	$query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }    
    }  

    public function mget_page_daftar_galeri($offset,$max){
        $this->db->select('*');
        $this->db->where('galeri_is_deleted','no');
        $this->db->order_by('id_galeri_tm','desc'); 
       $query = $this->db->get('galeri_tm',$offset,$max);
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }       
    } 

    public function mcek_jumlah_denah($id){
        $this->db->select('id_denah_tm');
        $this->db->where('id_denah_tm',$id); 
        $query = $this->db->get('denah_tm');
        return $query->num_rows();     
    }   

    public function m_tambah_denah($id_denah,$judul_denah){
        $this->db->set('id_denah_tm',$id_denah);         
        $this->db->set('id_galeri_tm',$judul_denah);
        return $this->db->insert('denah_tm');
    }

    public function m_edit_denah($id_denah,$judul_denah){    
        $this->db->set('id_galeri_tm',$judul_denah);
        $this->db->where('id_denah_tm',$id_denah);  
         return $this->db->update('denah_tm');         
    }

    public function mget_data_denah($id_denah){
        $this->db->select('*');
        $this->db->from('denah_tm as A');
        $this->db->join('galeri_tm as B', 'B.id_galeri_tm = A.id_galeri_tm');
        $this->db->where('A.id_denah_tm',$id_denah);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query;   
        }else{
            return false;
        }
    }
    // public function mcek_denah_exist($id){
    //     $this->db->select('id_denah_tm');
    //     $this->db->where('id_denah_tm',$id); 
    //     $query = $this->db->get('denah_tm');
    //     if($query->num_rows() == 1){
    //         return true;
    //     }else{
    //         return false;
    //     }       
    // }



}