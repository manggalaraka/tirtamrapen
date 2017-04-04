<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_profile extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function mget_profile_activated(){
        $this->db->select('*');
        $this->db->from('profile_tm');
        $this->db->where('profile_is_deleted','0');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function mcek_jumlah_profile(){
        $this->db->select('*');
        $this->db->from('profile_tm');
        $this->db->where('profile_is_deleted','0');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function mcek_jumlah_backgroundcover_profile(){
        $this->db->select('*');
        $this->db->from('photohead_profile_tm');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function mcek_used_backgroundcover_profile($id_photo){
        $this->db->select('*');
        $this->db->from('profile_tm');
        $this->db->where('info_cover_tm',$id_photo);
        $query = $this->db->get();
        if($query->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }

    public function mget_last_backgroundcover_profile(){
        $this->db->select('id_photo');
        $this->db->from('photohead_profile_tm');
        $this->db->order_by('id_photo','asc');
        $query = $this->db->get();
        if($query->num_rows() == 0){
            return false;
        }else if($query->num_rows() > 1){
            foreach($query->result() as $hasil){
                $id = $hasil->id_photo;
            }
            return $id;
        }
    }  

    public function m_buat_profile($params){
         $this->db->set('info_judul_tm',$params['info_judul_tm']);
         $this->db->set('info_ketjudul_tm',$params['info_ketjudul_tm']);
         $this->db->set('info_cover_tm',$params['info_cover_tm']);
         $this->db->set('info_tentang_tm',$params['info_tentang_tm']);
         $this->db->set('info_galeri_tm',$params['info_galeri_tm']);
         $this->db->set('info_telepon_tm',$params['info_telepon_tm']);
         $this->db->set('info_tm',$params['info_tm']);
         $this->db->set('info_lokasi_tm',$params['info_lokasi_tm']);
         $this->db->set('gmap_lat_tm',$params['gmap_lat_tm']);
         $this->db->set('gmap_lng_tm',$params['gmap_lng_tm']);
         $this->db->set('gmap_zoom_tm',$params['gmap_zoom_tm']);
         return $this->db->insert('profile_tm');
    }

        public function m_edit_profile($params){
         $this->db->set('info_judul_tm',$params['info_judul_tm']);
         $this->db->set('info_ketjudul_tm',$params['info_ketjudul_tm']);
         $this->db->set('info_tentang_tm',$params['info_tentang_tm']);
         $this->db->set('info_galeri_tm',$params['info_galeri_tm']);
         $this->db->set('info_telepon_tm',$params['info_telepon_tm']);
         $this->db->set('info_tm',$params['info_tm']);
         $this->db->set('info_lokasi_tm',$params['info_lokasi_tm']);
         $this->db->set('gmap_lat_tm',$params['gmap_lat_tm']);
         $this->db->set('gmap_lng_tm',$params['gmap_lng_tm']);
         $this->db->set('gmap_zoom_tm',$params['gmap_zoom_tm']);
         $this->db->where('id_profile_tm',$params['id_profile']);
         return $this->db->update('profile_tm'); 
    }

    public function m_tambah_backgrndcover_profile($params_cover){
        return $this->db->insert('photohead_profile_tm',$params_cover);
    }


    public function mget_data_profile_exist(){
        $this->db->select('*');
        $this->db->from('profile_tm');
        $this->db->order_by('id_profile_tm','desc');
        $this->db->where('profile_is_deleted','0');
        $query = $this->db->get();
         if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function mget_data_photoheader_exist(){
        $this->db->select('*');
        $this->db->from('photohead_profile_tm');
        $this->db->order_by('id_photo','desc');
        $this->db->where('headphoto_is_deleted','0');
        $query = $this->db->get();
        if($query->num_rows() >= 1){
            return $query;
        }else{
            return false;
        }
    }

    public function mset_data_photoheader($id_profile,$id_photo){
         $this->db->set('info_cover_tm',$id_photo);
         $this->db->where('id_profile_tm',$id_profile);
         return $this->db->update('profile_tm');         
    }

    public function mdel_data_photoheader($id_photo){
         $this->db->set('headphoto_is_deleted',"1");
         $this->db->where('id_photo',$id_photo);
         return $this->db->update('photohead_profile_tm');          
    }

}

