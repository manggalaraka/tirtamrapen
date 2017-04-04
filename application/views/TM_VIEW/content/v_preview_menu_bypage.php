<?php if(!$data_menu){ ?>
<div class="row">
	<div class="col-md-1 col-xs-1"></div>
	<div class="col-md-11 col-xs-11">
		<span style="margin-left:14px;" class="label label-danger"><?php echo $indikator_search." "; ?><i class="glyphicon glyphicon-remove" onclick="refresh_search('menu')"></i></span>
		<h4 class="text-center"> <p class="text-danger"> Menu <?php echo $indikator_search; ?> Tidak Ditemukan </p> </h4>
	</div>
</div>
<?php }else{ ?>

	<?php if($indikator == true){ ?>
<div class="row">
	<div class="col-md-1 col-xs-1"></div>
	<div class="col-md-11 col-xs-11">	
		<span style="margin-left:14px;" class="label label-success"><?php echo $indikator_search." "; ?><i class="glyphicon glyphicon-remove" onclick="refresh_search('menu')"></i></span>
		<h4 class="text-center"> <p class="text-danger"> Menu <?php echo $indikator_search; ?> Ditemukan </p> </h4></br>
	</div>
</div>
	<?php }?>

<div class="row">
</br></br>
<div class="col-md-1 col-xs-1"></div>
<div class="col-md-10 col-xs-10">
<?php  foreach($data_menu->result() as $hasil){
	$id_menu = $hasil->id_menu_tm;
?>
		<div class="col-md-3 col-xs-4">
			<a style="text-decoration:none; cursor:pointer;" onclick="modal_preview_menu('<?php echo $id_menu; ?>')"> 
			<div class="ratio-custom img-responsive-custom img-circle-custom" style="background-image:url(<?php echo base_url();?>/assets/TM_Public/img/menu_tm/<?php echo $hasil->foto_menu_tm ?>)"> 	
				<h4 class="span-text text-center">
					<span class="label-custom label-warning"><?php echo $hasil->nama_menu_tm;?></span>
				</h4>									
			</div>
			</a>
		</div>	
<?php } ?>
</div>
<div class="col-md-1 col-xs-1"></div>
</div>

<?php } ?>