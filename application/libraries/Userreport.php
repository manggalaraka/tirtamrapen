<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once APPPATH."third_party/User_Auth.php";

class Userreport{
  var $CI;
  public function __construct($params = array())
  {
        $this->CI =& get_instance();    
  }

  	public function flashdata_report($pesan){
        $flashdata_sukses = ( '</br></br><div id="toast-container" class="toast-bottom-full-width" aria-live="polite" role="alert"> 
                                   	<div class="toast toast-success">
                                    		<button class="toast-close-button" role="button"><i class="ion-android-close"></i></button>
                                   		<div class="toast-message">' .$pesan. '</div>
                                   	</div>
                               </div>');
        $flashdata_error = ( '</br></br><div id="toast-container" class="toast-bottom-full-width" aria-live="polite" role="alert"> 
                                   	<div class="toast toast-error">
                                    		<button class="toast-close-button" role="button"><i class="ion-android-close"></i></button>
                                   		<div class="toast-message">' .$pesan. '</div>
                                   	</div>
                               </div>');
                                  
        $report = array('sukses' => $flashdata_sukses,
                        'error' => $flashdata_error);
        return $report;
    }

    public function call_flashdata_report(){   
      if($this->CI->session->flashdata('error')){
          $pesan = $this->CI->session->flashdata('error');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['error'];
      }else if($this->CI->session->flashdata('sukses')){
          $pesan = $this->CI->session->flashdata('sukses');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['sukses'];
      } 
    }

}