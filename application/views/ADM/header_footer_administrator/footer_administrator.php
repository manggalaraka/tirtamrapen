	</body>
	<!-- BEGIN GLOBAL AND THEME VENDORS -->
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/js/global-vendors.js"></script>
	<!-- END GLOBAL AND THEME VENDORS -->

	<!-- BEGIN PLUGINS AREA / INDEX -->
	<script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/gmaps/gmaps.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/bxslider/jquery.bxslider.min.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/audiojs/audiojs/audio.min.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/rickshaw/rickshaw.min.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/jquery-knob/excanvas.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/gauge/gauge.min.js"></script>
	<!-- END PLUGINS AREA / INDEX -->

	<?=$external_footer?>

	<!-- BEGIN PLUGINS AREA -->
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
	<!-- END PLUGINS AREA -->


	<!-- PLEASURE -->
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/js/pleasure.js"></script>
	<!-- ADMIN 1 -->
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/admin1/js/layout.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/scripts/sliders.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/scripts/maps-google.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/scripts/widget-audio.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/scripts/charts-knob.js"></script>
	<script src="<?php echo base_url();?>/assets/TM_Adm/administrator/globals/scripts/index.js"></script>

	<?php $total_footer = sizeOf($function_footer); if($total_footer >= 1){ for($i=1; $i<=$total_footer; $i++){ ?>
		<?=$function_footer['footer_'.$i] ?>
	<?php }} ?>


	<!-- BEGIN INITIALIZATION-->
	<script>
		$(document).ready(function () {
			Pleasure.init();
			Layout.init();
		});
	</script>

	<?=$external_initialization?>
	<!-- END INITIALIZATION-->


	<!-- BEGIN Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', Pleasure.settings.ga.urchin, Pleasure.settings.ga.url);
		ga('send', 'pageview');
	</script>
	<!-- END Google Analytics -->
</html>