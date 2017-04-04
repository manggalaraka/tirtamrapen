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
			          <li><a href="<?php echo site_url('administrator/menu_kelola');?>">All</a></li>
			          <li><a href="<?php echo site_url('administrator/menu_kelola?kategori=seafood');?>">Seafood</a></li>
			          <li><a href="<?php echo site_url('administrator/menu_kelola?kategori=nonseafood');?>">Non Seafood</a></li>
			          <li><a href="<?php echo site_url('administrator/menu_kelola?kategori=minuman');?>">Minuman</a></li>
			        </ul>
			      </div><!-- /btn-group -->
			      <div class="input-group-btn">
					<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-search"> </i> </button>
				  </div>
			    </div><!-- /input-group -->
			    </form>
			  </div><!-- /.col-lg-8 -->

			  <div class="col-lg-12">
			  <?php if($keyword_pencarian!=null and $data_menu!=false ){ echo "pencarian <strong>'".$keyword_pencarian."'</strong> ditemukan";   }?>
			  </div>

			  </br>
			  </br>
			  </br>
			<?php if(!$data_menu){ ?>
				<div class="row example-row">
					<div class="col-md-12">
						<h4> <p class="text-danger"> Data Tidak Ditemukan </p> </h4>
					</div><!--.col-md-9-->
				</div><!--.row-->
			<?php }else{ ?>
			<?php foreach($data_menu->result() as $hasil){ ?>
				<div class="col-md-4">
					<div class="card card-news-more">
						<div class="card-heading bg-image bg-opaque5" style="background-image: url('<?php echo base_url();?>/assets/TM_Public/img/menu_tm/<?php echo $hasil->foto_menu_tm ?>');">				

							<div class="heading-content">
								<span class="badge"><?php echo $hasil->jenis_menu_tm ?></span>
								<a href="#" data-toggle="modal" style="color:black; text-decoration:none; cursor:pointer;"><span class="headline"><strong><?php echo $hasil->nama_menu_tm ?></strong></span></a>
								<button class="btn btn-floating btn-pink toggle-card-news-more"><i class="ion-android-create"></i></button>
							</div>
						</div><!--.card-heading-->
						<div class="card-body">
							<p> <?php echo $hasil->info_menu_tm ?></p>
						<div class="card-footer">
							<ul>
								<li style="float:left;"><a style="text-decoration:none; cursor:pointer;" href="#edit_<?php echo $hasil->id_menu_tm;?>" data-toggle="modal"><i class="ion-edit"></i> Edit Menu</a></li>
								<li style="float:right;"><a style="text-decoration:none; cursor:pointer;" href="#upload_<?php echo $hasil->id_menu_tm;?>" data-toggle="modal"><i class="ion-image"></i> Ubah Foto</a></li>
							</ul>
						</div><!--.card-footer-->	
						</div><!--.card-body-->				
					</div><!--.card-->
				</div><!--.col-md-4-->


				<!--Modal Edit-->
				<div class="modal scale fade full-height from-right" id="edit_<?php echo $hasil->id_menu_tm;?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Data Menu Edit</h4>
							</div>
							<div class="modal-body">
							
							<?php echo form_open_multipart('menu_tm/act_menu_edit','class="form-horizontal parsley-validate"');?>
							<div class="form-group">
								<div class="col-md-3">Id Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="id_menu" value="<?php echo $hasil->id_menu_tm;?>" class="form-control" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Nama Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="nama_menu" value="<?php echo $hasil->nama_menu_tm;?>" class="form-control" placeholder="Nama Menu"  required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->
							
							<div class="form-group">
								<div class="col-md-3">Jenis Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<select class="selectpicker" onchange="set_kategori(this.id)" id="jenis_menu" required name="jenis_menu">
										<option value="<?php echo $hasil->jenis_menu_tm; ?>" selected="selected" disabled="disabled">pilihan (<?php echo $hasil->jenis_menu_tm; ?>)</option>
										<option value="makanan" data-icon="fa fa-cutlery">Makanan</option>
										<option value="minuman" data-icon="glyphicon-glass">Minuman</option>
									</select>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="form-group">
								<div class="col-md-3">Kategori Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<select class="selectpicker" required name="kategori_menu">
										<option value="<?php echo $hasil->kategori_menu_tm; ?>"  selected="selected" disabled="disabled">pilihan (<?php if($hasil->kategori_menu_tm == "nonseafood"){echo "non seafood";}else{ echo $hasil->kategori_menu_tm;} ?>)</option>
										<option value="seafood">Seafood</option>
										<option value="nonseafood">Non Seafood</option>
										<option value="minuman">Minuman</option>
									</select>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="form-group">
								<div class="col-md-3">Harga Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="number" name="harga_menu" value="<?php echo $hasil->harga_menu_tm;?>" class="form-control" placeholder="Harga Menu" minlength="4" required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="form-group">
								<div class="col-md-3">Keterangan Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="ket_menu" rows="3" placeholder="Keterangan Menu" maxlength="1000" required><?php echo $hasil->info_menu_tm;?></textarea>
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
				<div class="modal scale fade full-height from-right" id="upload_<?php echo $hasil->id_menu_tm;?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Ubah Foto Menu</h4>
							</div>
							<div class="modal-body">
							<?php echo form_open_multipart('menu_tm/act_fotomenu_edit','class="form-horizontal parsley-validate"');?>	
							
							<div class="form-group">
								<div class="col-md-3">Id Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="id_menu" value="<?php echo $hasil->id_menu_tm;?>" class="form-control" readonly required>
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
												<input type="file" name="background_profile" maxlength="2000" required>
											</span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
										</div>
									</div>

								</div><!--.col-md-9-->
							</div><!--.row-->
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