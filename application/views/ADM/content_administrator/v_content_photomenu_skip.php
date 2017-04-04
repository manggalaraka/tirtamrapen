<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN FOTO MENU</h4></div>
					</div><!--.panel-heading-->
						<div class="panel-body">

						<!-- <form action="#" class="form-horizontal parsley-validate"> -->
						<?php echo form_open_multipart('menu_tm/act_photomenu_upload_or_skip','class="form-horizontal parsley-validate"');?>
						<div class="form-body">
							<?php echo validation_errors(); ?>

							<div class="form-group">
								<div class="col-md-3">ID Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="id_menu" value="<?php echo $param1;?>" class="form-control" placeholder="Id Menu" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Nama Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="nama_menu" value="<?php echo $param2;?>" class="form-control" placeholder="Nama Menu" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->



							<div class="form-group">
								<div class="col-md-3">Foto Menu</div><!--.col-md-3-->
								<div class="col-md-9">

									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<!-- <img data-src="holder.js/100%x100%" src="holder.js/100x100" alt="..."> -->
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-default btn-file">
												<span class="fileinput-new">Pilih Gambar</span>
												<span class="fileinput-exists">Ganti</span>
												<input type="file" name="background_profile" maxlength="2000">
											</span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
										</div>
									</div>

								</div><!--.col-md-9-->
							</div><!--.row-->

							</br></br>

							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
						</form>	
						</div>

						</div><!--.panel-body-->
				</div>

			<div class="footer bg-blue margin-top-40">
				<ul class="social">
				Skip Upload Foto Menu
					<li><a href="<?php echo site_url('administrator/menu_baru');?>"><i class="ion-arrow-right-c"></i></a></li>
				</ul>
			</div><!--.footer-->

			</div>
</div>		




