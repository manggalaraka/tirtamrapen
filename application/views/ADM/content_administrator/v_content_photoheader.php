		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4><?php echo $judul_panel; ?></h4></div>
					</div>
					<div class="panel-body">

						<div class="row no-gutters">
						<?php if(!$data_photoheader_profile) { ?>

						<?php echo "<h1> Tidak Ditemukan Foto</h1>"; } else { ?>
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="card card-news card-black bg-image bg-opaque6 sample-bg-image14">

									<div class="card-heading">									
										<a style="cursor:pointer;" onclick="call_modal_upload()">
											<h3 class="card-title"><i class="heading-icon fa fa-life-ring"></i>Tambah Photo Header</h3>
										</a>
									</div>
									<div class="card-body">
										</br></br></br>
									</div><!--.card-body-->

								</div>
							</div>
							<?php foreach($data_photoheader_profile->result() as $hasil) { ?>
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="card card-user-new">
								<a href="" onclick="call_modal_preview(this.id)" data-toggle="modal" id="img_<?php echo $hasil->filename_photo;?>">	
									<img src="<?php echo base_url();?>/assets/TM_Public/img/background-head/<?php echo $hasil->filename_photo;?>" class="member-image" width="300" height="300">
									<div class="card-body">
										<h5><?php echo $hasil->filename_photo; ?></h5>
										<h6>extension  <?php echo $hasil->extension_photo; ?></h6>
										<ul class="social-links list-inline">
											<li><a onclick="set_photoheader('set_<?php echo $hasil->filename_photo;?>','<?php echo $hasil->id_photo;?>')" id="set_<?php echo $hasil->filename_photo;?>"><i class="ion-checkmark-circled"></i></a></li>
											<li><a onclick="delete_photoheader('del_<?php echo $hasil->filename_photo;?>','<?php echo $hasil->id_photo;?>')" id="del_<?php echo $hasil->filename_photo;?>"><i class="fa fa-trash"></i></a></li>
										</ul>
									</div>
								</a>
								</div>
							</div>
							<?php } ?>	
						<?php } ?>
						</div>

					</div>
				</div>
			</div>
		</div>







	<!-- Modal Upload -->
	<div id="upload_photoheader" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Tambah Foto Header</h4>
	      </div>
	      <div class="modal-body">
	      	<?php echo form_open_multipart('profile_tm/act_profile_photoheader_upload');?>
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
						<!-- <img data-src="holder.js/100%x100%" src="holder.js/100x100" alt="..."> -->
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
					<div>
						<p class="text-red"> * max size 2mb</p>
						<span class="btn btn-default btn-file">
							<span class="fileinput-new">Pilih Gambar</span>
							<span class="fileinput-exists">Ganti</span>
							<input type="file" name="background_profile" maxlength="2000" required>
						</span>
						<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
					</div>
				</div>
	  	        <div class="modal-footer">
					<Input type="submit" class="btn btn-primary" value="Simpan">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	      		</div>				
	        </form>
	      </div>
	    </div>

	  </div>
	</div>


	<!-- Modal Preview -->
	<div id="preview_photoheader" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
		<div class="modal-body">
	      		<div id="isi_preview"></div>
	      		<img id="photoheader-image" class="center-block img-responsive"> 
	      		<h5><p class="text-center" style="color: #fff;" id="judul_preview"></p></h5>
	    </div>	    
	  </div>
	</div>



	<div id="konfirmasi_photoheader" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Konfirmasi Dialog</h4>
	      </div>
	      <div class="modal-body">
	        <p id="isi_konfirmasi"></p>
	      </div>
	      <div class="modal-footer" id="footer_konfirmasi">
	        <button type="button" class="btn btn-success" id="button_konfirmasi">Ya</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	      </div>
	    </div>

	  </div>
	</div>

