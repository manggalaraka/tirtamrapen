<script>

	function call_modal_upload(){
	$('#upload_photoheader').modal('show');
	}

	function call_modal_preview(id){
		$('#preview_photoheader').modal('show');
		var get_id_name = id.substr(4);
		//document.getElementById("isi_preview").innerHTML = "<?php echo base_url();?>/assets/TM_Public/img/background-head/"+get_id_name+"?>";
	  	document.getElementById("photoheader-image").src = "<?php echo base_url();?>/assets/TM_Public/img/background-head/"+get_id_name+"?>";
	  	document.getElementById("judul_preview").innerHTML = get_id_name;
	}

	function set_photoheader(name_photo,id_photo){
		var get_name = name_photo.substr(4);
		var msg = "apakah anda yakin menggunakan foto "+get_name+" sebagai photoheader ?";
		var type = "set";
		modal_confirm(id_photo,type,msg);
	}

	function delete_photoheader(name_photo,id_photo){
		var get_name = name_photo.substr(4);
		var msg = "apakah anda yakin menghapus photoheader "+get_name+" ?";
		var type = "del";
		modal_confirm(id_photo,type,msg);
	}

	function modal_confirm(id,type,msg){
		$('#konfirmasi_photoheader').modal('show');
		document.getElementById("isi_konfirmasi").innerHTML = msg;
		document.getElementById("button_konfirmasi").onclick = function(){
				if(type=="set"){
				//alert(id);					
				$.ajax({
		              type: "post",
		              url: "<?php echo site_url('/profile_tm/act_profile_photoheader_set')?>",
		              data: { 'id_photo':id},
		              success: function(){ 
		              			window.location.assign("<?php echo site_url('/administrator/profile_photoheader');?>");
		            },
		              error: function() {
		                      	alert("set photoheader gagal");
		            }

		    	}); 
			}else if(type =="del"){
				//alert(id);
				$.ajax({
		              type: "post",
		              url: "<?php echo site_url('/profile_tm/act_profile_photoheader_del')?>",
		              data: { 'id_photo':id},
		              success: function(){ 
		              			window.location.assign("<?php echo site_url('/administrator/profile_photoheader');?>");
		            },
		              error: function() {
		                      	alert("del photoheader gagal");
		            }

		    	}); 
			}
		}
	}

</script>