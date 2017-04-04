		<div class="row">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h3><?php echo $panel_title;?></h3></div>
			</div><!--.panel-heading-->
			<div class="panel-body">

			<div class="col-lg-12">
				<form action="" method="get">
			    <div class="input-group">
			      <input type="text" class="form-control" name="search" placeholder="keyword pencarian" aria-label="..." id="search_menu">
			      <div class="input-group-btn">
			        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
			        <ul class="dropdown-menu dropdown-menu-right">
			          <li><a href="<?php echo site_url('administrator/galeri_kelola');?>">All</a></li>
			          <li><a href="<?php echo site_url('administrator/galeri_kelola?kategori=area_pengunjung');?>">Area Pengunjung</a></li>
			          <li><a href="<?php echo site_url('administrator/galeri_kelola?kategori=fasilitas');?>">Fasilitas</a></li>
			          <li><a href="<?php echo site_url('administrator/galeri_kelola?kategori=pemandangan');?>">Pemandangan</a></li>
			        </ul>
			      </div><!-- /btn-group -->
			      <div class="input-group-btn">
					<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-search"> </i> </button>
				  </div>
			    </div><!-- /input-group -->
			    </form>
			  </div><!-- /.col-lg-8 -->

			  <div class="col-lg-12">
			  <?php if($keyword_pencarian!=null and $data_galeri!=false ){ echo "pencarian <strong>'".$keyword_pencarian."'</strong> ditemukan";   }?>
			  </div>

			  </br>
			  </br>
			  </br>



			<?php if(!$data_galeri){ ?>
				<div class="row example-row">
					<div class="col-md-12">
						<h4> <p class="text-danger"> Data Tidak Ditemukan </p> </h4>
					</div><!--.col-md-9-->
				</div><!--.row-->
			<?php }else{ ?>
			<?php foreach($data_galeri->result() as $hasil){ ?>

			<div class="col-md-3">
				<div class="card tile card-image card-black bg-image bg-opaque8" style="background-image: url('<?php echo base_url();?>/assets/TM_Public/img/galeri_tm/<?php echo $hasil->foto_galeri_tm ?>');">

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

				</div><!--.card-->
			</div><!--.col-->			


				<!--Modal Edit-->
				<div class="modal scale fade full-height from-right" id="edit_<?php echo $hasil->id_galeri_tm;?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Data galeri Edit</h4>
							</div>
							<div class="modal-body">
							
							<?php echo form_open_multipart('galeri_tm/act_galeri_edit','class="form-horizontal parsley-validate"');?>
							<div class="form-group">
								<div class="col-md-3">Id Galeri</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="id_galeri" value="<?php echo $hasil->id_galeri_tm;?>" class="form-control" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Judul Galeri</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="judul_galeri" value="<?php echo $hasil->judul_galeri_tm;?>" class="form-control" placeholder="Judul Galeri"  required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->
							


							<div class="form-group">
								<div class="col-md-3">Kategori</div><!--.col-md-3-->
								<div class="col-md-9">
									<select class="selectpicker" required name="kategori_galeri">
										<option value="<?php echo $hasil->kategori_galeri_tm; ?>"  selected="selected" disabled="disabled">pilihan (<?php if($hasil->kategori_galeri_tm == "area_pengunjung"){echo "area pengunjung";}else{ echo $hasil->kategori_galeri_tm;} ?>)</option>
										<option value="area_pengunjung">Area Pengunjung</option>
										<option value="fasilitas">Fasilitas</option>
										<option value="pemandangan">Pemandangan</option>
									</select>
								</div><!--.col-md-9-->
							</div><!--.row-->



							<div class="form-group">
								<div class="col-md-3">Info Galeri</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="ket_galeri" rows="3" placeholder="Keterangan Menu" maxlength="1000"><?php if($hasil->info_galeri_tm ==""){echo "tidak ada data";}else{echo $hasil->info_galeri_tm; }?></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="modal-footer">
								<input type="submit" value="Simpan" class="btn btn-flat-primary">
								<button type="button" class="btn btn-flat-danger" data-dismiss="modal">Batal</button>
							</div>
							</form>


							</div>
						</div>
					</div>
				</div>
				<!--.modal-->		

				<!--Modal Upload-->
				<div class="modal scale fade full-height from-right" id="upload_<?php echo $hasil->id_galeri_tm;?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Ubah Foto galeri</h4>
							</div>
							<div class="modal-body">
							<?php echo form_open_multipart('galeri_tm/act_fotogaleri_edit','class="form-horizontal parsley-validate"');?>	
							
							<div class="form-group">
								<div class="col-md-3">Id galeri</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="id_galeri" value="<?php echo $hasil->id_galeri_tm;?>" class="form-control" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Foto galeri</div><!--.col-md-3-->
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
												<input type="file" name="background_profile" maxlength="2000" required>
											</span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
										</div>
									</div>

								</div><!--.col-md-9-->
							</div><!--.row-->
							</div>
							<div class="modal-footer">
								<input type="submit" value="Simpan" class="btn btn-flat-primary">
								<button type="button" class="btn btn-flat-danger" data-dismiss="modal">Batal</button>
							</div>
							
							</form>
						</div>
					</div>
				</div>
				<!--.modal-->	

		<?php } ?>
		<?php } ?>
			</div>
		</div>


		</div><!--.row-->