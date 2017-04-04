<script>

	function set_coordinare_default(id){
		var indikator = document.getElementById(id);
		var lat = document.getElementById("gmap_lat_profile");
		var lng = document.getElementById("gmap_lng_profile");
		var zoom = document.getElementById("gmap_zoom_profile");

		 if(indikator.checked == true){
			lat.value = "-7.547943";
			lng.value = "110.268922";
			zoom.value = "14";

			lat.readOnly = true; 
			lng.readOnly = true; 
			zoom.readOnly = true;

		}else if(indikator.checked == false){
			lat.value = null;
			lng.value = null;
			zoom.value = null;

			lat.readOnly = false; 
			lng.readOnly = false; 
			zoom.readOnly = false;
		}
	}

	function editprofile_all(params){
		var id = params.substr(15);
		var data = get_alldata_profile();
		$.ajax({
	              type: "post",
	              url: "<?php echo site_url('/profile_tm/act_profile_edit_all')?>",
	              data: { 'judul_profile':data[0],
	          			  'ketjudul_profile':data[1],
						  'tentang_profile':data[2],
						  'galeri_profile':data[3],
						  'telp_profile':data[4],
						  'info_profile':data[5],
						  'lokasi_profile':data[6],
						  'gmap_lat_profile':data[7],
						  'gmap_lng_profile':data[8],
						  'gmap_zoom_profile':data[9],
						  'profile_id':id},
	              success: function(){ 
	              			window.location.assign("<?php echo site_url('/administrator/profile_kelola');?>");
	            },
	              error: function() {
	                      	alert("gagal");
	            }

	    }); 
	}

	function previewprofile_all(params){
		var id = params.substr(16);
		var data = get_alldata_profile();
		$.ajax({
	              type: "post",
	              url: "<?php echo site_url('/profile_tm/act_profile_session')?>",
	              data: { 'judul_profile':data[0],
	          			  'ketjudul_profile':data[1],
						  'tentang_profile':data[2],
						  'galeri_profile':data[3],
						  'telp_profile':data[4],
						  'info_profile':data[5],
						  'lokasi_profile':data[6],
						  'gmap_lat_profile':data[7],
						  'gmap_lng_profile':data[8],
						  'gmap_zoom_profile':data[9],
						  'profile_id':id},
	              success: function(){ 
	              			var redirectWindow = window.open("<?php echo site_url('/home/website_preview');?>", '_blank');
	              			redirectWindow.location;
	            },
	              error: function() {
	                      	alert("gagal");
	            }

	    }); 
	}

	function get_alldata_profile(){
		var judul = document.getElementsByName("judul_profile")[0].value;
		var ketjudul = document.getElementsByName("ketjudul_profile")[0].value;
		var tentang = document.getElementsByName("tentang_profile")[0].value;
		var galeri = document.getElementsByName("galeri_profile")[0].value;
		var telepon = document.getElementsByName("telp_profile")[0].value;
		var info = document.getElementsByName("info_profile")[0].value;
		var lokasi = document.getElementsByName("lokasi_profile")[0].value;
		var gmap_lat = document.getElementsByName("gmap_lat_profile")[0].value;
		var gmap_lng = document.getElementsByName("gmap_lng_profile")[0].value;
		var gmap_zoom = document.getElementsByName("gmap_zoom_profile")[0].value;


		var data_edit = [judul,ketjudul,tentang,galeri,telepon,info,lokasi,gmap_lat,gmap_lng,gmap_zoom];

		return data_edit;
	}

	// function get_alldata_summernote_profile(){
	// 	var judul = document.getElementById("judul_profile").value;
	// 	var ketjudul = document.getElementById("ketjudul_profile").value;
	// 	var tentang = document.getElementById("tentang_profile").innerHTML;
	// 	var galeri = document.getElementById("galeri_profile").innerHTML;
	// 	var telepon = document.getElementById("telp_profile").innerHTML;
	// 	var info = document.getElementById("info_profile").innerHTML;
	// 	var lokasi = document.getElementById("lokasi_profile").innerHTML;
	// 	var gmap_lat = document.getElementById("gmap_lat_profile").value;
	// 	var gmap_lng = document.getElementById("gmap_lng_profile").value;
	// 	var gmap_zoom = document.getElementById("gmap_zoom_profile").value;


	// 	var data_edit = [judul,ketjudul,tentang,galeri,telepon,info,lokasi,gmap_lat,gmap_lng,gmap_zoom];

	// 	return data_edit;	
	// }

</script>