	
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/bootstrap.js"></script>
	<script>

		function modal_preview_menu(id){
			//alert(id);
			  $.ajax({
	          type: "post",
              cache:"false",
              dataType: "json",
	          url : "<?php echo site_url('home/get_menu_modal')?>",
	          data: {'id_menu': id},
	          success: function(result){
	          	call_modal_prevmenu(result);
	          },
	          error: function(result) {
	          	alert("request menu gagal");
	          }
	          });	
		}

		function call_modal_prevmenu(data){
	        var menu = data['nama_menu'];
	        var info = data['info_menu'];
	        var jenis = data['jenis_menu'];
	        var foto = data['foto_menu'];

	        var menu_photo_path = "<?php echo base_url();?>assets/TM_Public/img/menu_tm/";
	        document.getElementById('judul_modal_menu').innerText = menu;
	        document.getElementById('info_modal_menu').innerText = info;
	        document.getElementById('foto_modal_menu').src = menu_photo_path+foto;

	        $('#preview_menu_modal').modal("show");
			$('#preview_menu_modal').modal({
			  backdrop: 'static',
			  keyboard: false
			})

			$('#navmenu').fadeOut(100);
		}

		function call_modal_prevdenah(data){
		   var denah = data['nama_denah'];
		   var judul = data['judul_denah'];
		   var info = data['info_denah'];
		   var foto = data['photo_denah'];

           var get_denah_title = document.getElementById('denah_title');
           var get_denah_img = document.getElementById('denah_img');
           var get_denah_info = document.getElementById('denah_info');
           var get_denah_judul = document.getElementById('denah_judul');

           var denah_photo_path = "<?php echo base_url();?>assets/TM_Public/img/galeri_tm/";
           get_denah_title.innerText = denah;
           get_denah_info.innerText = info;
           get_denah_judul.innerText = judul;
           get_denah_img.src = denah_photo_path+foto;

           $("#modal_preview_denah").modal("show");
           $('#modal_preview_denah').modal({
			  backdrop: 'static',
			  keyboard: false
			})

			$('#navmenu').fadeOut(100);
		}



		$('#preview_menu_modal').on('hidden.bs.modal', function () {
		  $('#navmenu').fadeIn(100);
		});

		$('#modal_preview_denah').on('hidden.bs.modal', function () {
		  $('#navmenu').fadeIn(100);
		});


		function go_to_page(id,params){
			get_id_selectoption = document.getElementById(id);
			var selectedValue = get_id_selectoption.options[get_id_selectoption.selectedIndex].value;

			if(params == "menu"){
				var arraydata = <?php echo json_encode($conf_paging_menu); ?>;
				var get_data_quarter = arraydata[selectedValue]['quarter'];
				var get_data_offset = arraydata[selectedValue]['offset'];
				var get_data_max = arraydata[selectedValue]['jumlah'];
			}else if(params == "galeri"){
				var arraydata = <?php echo json_encode($conf_paging_galeri); ?>;
				var get_data_quarter = arraydata[selectedValue]['quarter'];
				var get_data_offset = arraydata[selectedValue]['offset'];
				var get_data_max = arraydata[selectedValue]['jumlah'];
			}
				get_data_page(get_data_quarter,get_data_offset,get_data_max,params);
		}

		function go_menu_search(){
			var getsearch = document.getElementById('pencarian_menu').value;
			var param = "menu";
			if(!getsearch || getsearch == ""){
				refresh_search(param);
			}else{
				get_data_search(getsearch,param);
			}
		}

		function go_galeri_search(){
			var getsearch = document.getElementById('pencarian_galeri').value;
			var param = "galeri";
			if(!getsearch || getsearch == ""){
				refresh_search(param);
			}else{
				get_data_search(getsearch,param);
			}
		}

		function get_data_page(quarter,offset,max,params){
			if(params == "menu"){
				var getdiv = document.getElementById('dynamic_content');
				getdiv.innerHTML="";
				$("#dynamic_content").load('../../../tirtamrapen/home/menu_paging_search', {offset:offset, max:max}).hide().fadeIn('slow');
			}else if(params="galeri"){
				var getdiv = document.getElementById('dynamic_content_galeri');
				getdiv.innerHTML="";
				$("#dynamic_content_galeri").load('../../../tirtamrapen/home/galeri_paging_search', {offset:offset, max:max}).hide().fadeIn('slow');
			}
		}

		function get_data_search(query,param){
			if(param == "menu"){
				var getdiv = document.getElementById('dynamic_content');
				getdiv.innerHTML="";
				$("#dynamic_content").load('../../../tirtamrapen/home/menu_paging_search', {search:query}).hide().fadeIn('slow');
				document.getElementById('pencarian_menu').value = "";
			}else if(param == "galeri"){
				var getdiv = document.getElementById('dynamic_content_galeri');
				getdiv.innerHTML="";
				$("#dynamic_content_galeri").load('../../../tirtamrapen/home/galeri_paging_search', {search:query}).hide().fadeIn('slow');
				document.getElementById('pencarian_galeri').value = "";
			}
		}

		function refresh_search(param){
			if(param == "menu"){
				$("#dynamic_content").load('../../../tirtamrapen/home/menu_paging_search').hide().fadeIn('slow');
				 var temp=""; 
			    $("#pencarian_menu").val(temp);
			}else if(param == "galeri"){
				$("#dynamic_content_galeri").load('../../../tirtamrapen/home/galeri_paging_search').hide().fadeIn('slow');
				 var temp=""; 
			    $("#pencarian_galeri").val(temp);				
			}
		}
	</script>

	<script>
	      function initMap() {
	      	var datalat = parseFloat("<?php echo $this->data['info_map_lat']; ?>");
	      	var datalng = parseFloat("<?php echo $this->data['info_map_lng']; ?>");
	      	var datazoom = "<?php echo $this->data['info_map_zoom']; ?>";


	        var mapDiv = document.getElementById('map');
	        var myLatLng = {lat: datalat, lng: datalng}
	        var map = new google.maps.Map(mapDiv, {
	          center: myLatLng,
	          zoom: parseInt(datazoom),
	        });

	        var marker = new google.maps.Marker({
			   position: myLatLng,
			   map: map
			 });

	        var infowindow = new google.maps.InfoWindow({
			   content:"<strong> Jl. Sawangan KM 2 Ds. Tapen </strong> </br> <i> Dari Magelang ambil arah menuju Jogja, sampai daerah <B> Blabak </B> belok kiri ambil arah menuju <B> Ketep </B> , ikuti jalan kurang lebih 2km <i>"
			});

			google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
			});

	      }
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFR_p6rMnTipvIryouPqgZ8e45kcsn3k8&callback=initMap"
    async defer></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"async defer></script> -->



	<?=$mainjs_def?>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/raphael2-min.js"></script>
	<?=$denah?>
</html>
		