<?php if(!$data_galeri){ ?>
<div class="row">
	<div class="col-md-1 col-xs-1"></div>
	<div class="col-md-11 col-xs-11">
		<span style="margin-left:14px;" class="label label-danger"><?php echo $indikator_search." "; ?><i class="glyphicon glyphicon-remove" onclick="refresh_search('galeri')"></i></span>
		<h4 class="text-center"> <p class="text-danger"> Data Galeri <?php echo $indikator_search; ?> Tidak Ditemukan </p> </h4>
	</div>
</div>
<?php }else{ ?>

	<?php if($indikator == true){ ?>
<div class="row">
	<div class="col-md-1 col-xs-1"></div>
	<div class="col-md-11 col-xs-11">	
		<span style="margin-left:14px;" class="label label-success"><?php echo $indikator_search." "; ?><i class="glyphicon glyphicon-remove" onclick="refresh_search('galeri')"></i></span>
		<h4 class="text-center"> <p class="text-danger"> Data Galeri <?php echo $indikator_search; ?> Ditemukan </p> </h4></br>
	</div>
</div>
	<?php }?>

				<div  class="row">
					<div class="col-md-1 col-xs-1"> </div>
					<div class="col-md-9 col-xs-9">
							<?php foreach($data_galeri->result() as $hasil){ ?>
							<div class="col-md-6">
								<!-- <div class="card tile card-image card-black bg-image bg-opaque8" style="background-image: url('<?php echo base_url();?>/assets/TM_Public/img/galeri_tm/<?php echo $hasil->foto_galeri_tm ?>');"> -->
								<div class="ratio-custom card card-black bg-image bg-opaque8" style="background-image: url('<?php echo base_url();?>/assets/TM_Public/img/galeri_tm/<?php echo $hasil->foto_galeri_tm ?>');">

									<div class="context has-action-left has-action-right">

										<div class="tile-action">
											<a style="text-decoration:none; cursor:pointer;" href="#edit_<?php echo $hasil->id_galeri_tm;?>" data-toggle="modal"><i class="ion-edit"></i></a>
										</div>

										<div class="tile-content">
											<span class="text-title"><strong><?php echo $hasil->judul_galeri_tm ?></strong></span>
											<span class="text-subtitle"><?php if($hasil->kategori_galeri_tm == "area_pengunjung"){echo "area pengunjung";}else{ echo $hasil->kategori_galeri_tm;} ?></span>
										</div>

										<div class="tile-action right">
											<a style="text-decoration:none; cursor:pointer;" href="#upload_<?php echo $hasil->id_galeri_tm;?>" data-toggle="modal"><i class="ion-image"></i></a>
										</div>

									</div>

								</div>
							</div>	
							<?php } ?>
					</div>
					<div class="col-md-1 col-xs-1"> </div>
				</div>

 <?php } ?> 