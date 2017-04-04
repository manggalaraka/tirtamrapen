<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/jquery.mmenu.all.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/bootsrap-anchor.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/main.js"></script>
	<script>
	      function initMap() {
	      	var datalat = parseFloat("<?php echo $content_preview['preview_info_map_lat']; ?>>");
	      	var datalng = parseFloat("<?php echo $content_preview['preview_info_map_lng']; ?>");
	      	var datazoom = "<?php echo $content_preview['preview_info_map_zoom']; ?>";

	      	//alert("data latitude: "+datalat + "\n\n"+ "data langitude: "+ datalng);


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
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"async defer></script>
</html>
		