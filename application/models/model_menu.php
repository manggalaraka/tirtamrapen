<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_menu extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function mget_last_menu(){
        $this->db->select('id_menu_tm');
        $this->db->from('menu_tm');
        $this->db->order_by('id_menu_tm','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_menu_tm;
            }
            return $id;
        }
    } 

    public function mcek_jumlah_menu(){
        $this->db->select('*');
        $this->db->from('menu_tm');
        $query = $this->db->get();
        return $query->num_rows();
    }  

	public function m_tambah_menubaru($params){
         $this->db->set('id_menu_tm',$params['id_menu_tm']);
         $this->db->set('nama_menu_tm',$params['nama_menu_tm']);
         $this->db->set('harga_menu_tm',$params['harga_menu_tm']);
         $this->db->set('info_menu_tm',$params['info_menu_tm']);
         $this->db->set('jenis_menu_tm',$params['jenis_menu_tm']);
         $this->db->set('kategori_menu_tm',$params['kategori_menu_tm']);
         $this->db->set('foto_menu_tm',$params['foto_menu_tm']);
         $this->db->set('menu_is_deleted',$params['menu_is_deleted']);
         return $this->db->insert('menu_tm');
    } 

	public function m_edit_menu($params){
         $this->db->set('nama_menu_tm',$params['nama_menu_tm']);
         $this->db->set('harga_menu_tm',$params['harga_menu_tm']);
         $this->db->set('info_menu_tm',$params['info_menu_tm']);
         $this->db->set('jenis_menu_tm',$params['jenis_menu_tm']);
         $this->db->set('kategori_menu_tm',$params['kategori_menu_tm']);
         $this->db->set('menu_is_deleted',$params['menu_is_deleted']);
         $this->db->where('id_menu_tm',$params['id_menu_tm']);	
         return $this->db->update('menu_tm'); 	
	}    

    public function mget_daftar_menu(){
		$this->db->select('*');
        $this->db->where('menu_is_deleted','no');
        $this->db->order_by('nama_menu_tm','asc');
        $this->db->order_by('jenis_menu_tm','asc');
        // $query = $this->db->get('menu_tm',3,9);
        //$query = $this->db->get('menu_tm',3,6);
        // $query = $this->db->get('menu_tm',3,3);
        // $query = $this->db->get('menu_tm',3,0);
       
       $query = $this->db->get('menu_tm');
         
         //$query = $this->db->get('menu_tm',5,10);
         //$query = $this->db->get('menu_tm',5,5);
         //$query = $this->db->get('menu_tm',5,0);
        
        // $query = $this->db->get('menu_tm',3,12);
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }    	
    } 

    public function mget_page_daftar_menu($offset,$max){
		$this->db->select('*');
        $this->db->where('menu_is_deleted','no');
        $this->db->order_by('nama_menu_tm','asc');
        $this->db->order_by('jenis_menu_tm','asc');
       $query = $this->db->get('menu_tm',$offset,$max);
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }    	
    } 

    public function mget_daftar_menu_byparams($params){
    	$this->db->select('*');
        $this->db->from('menu_tm');
        $this->db->where('menu_is_deleted','no');

    	//cek array exist
    	if(array_key_exists("indikator1",$params) and array_key_exists("indikator2",$params)){		
    		$parameter1 = $params['indikator1'];
    		$parameter2 = $params['indikator2'];
	    	$this->db->where('kategori_menu_tm',$parameter2);
	    	$this->db->like('nama_menu_tm',$parameter1);
    	}else if(array_key_exists("indikator1",$params)){
	    	$parameter1 = $params['indikator1'];
	    	$this->db->like('nama_menu_tm',$parameter1);
    	}else if(array_key_exists("indikator2",$params)){
	    	$parameter2 = $params['indikator2'];
	    	$this->db->where('kategori_menu_tm',$parameter2);
    	} 
    	$this->db->order_by('nama_menu_tm','asc');

    	$query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            return $query;
        }    
    }     

    public function mget_id_fotomenu($id_menu){
		$this->db->select('foto_menu_tm');
        $this->db->from('menu_tm');
        $this->db->where('id_menu_tm',$id_menu); 
        $query = $this->db->get();   	
 		if($query->num_rows() > 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
            	$id_fotomenu = $hasil->foto_menu_tm;
            }
            return $id_fotomenu;
        }   
    }

    public function mupdate_filename_fotomenu($id_menu,$filename){
         $this->db->set('foto_menu_tm',$filename);
         $this->db->where('id_menu_tm',$id_menu);	
         return $this->db->update('menu_tm');    	
    } 

    public function mget_datamenu_bymodal($id_menu){
		$this->db->select('*');
        $this->db->from('menu_tm');
        $this->db->where('id_menu_tm',$id_menu); 
        $query = $this->db->get();   	
 		if($query->num_rows() > 1){
            return false;
        }else{
            return $query;
        }       	
    } 

}