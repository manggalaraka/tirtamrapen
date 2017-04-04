<div class="row">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN GALERI</h4></div>
					</div><!--.panel-heading-->
						<div class="panel-body">

						<div class="col-md-12">
							<?php echo form_open_multipart('galeri_tm/act_galeri_baru','class="form-horizontal parsley-validate"');?>
								</br>
								<div class="form-group">
									<div class="col-md-3">Nama Tempat</div><!--.col-md-3-->
									<div class="col-md-9">
										<div class="inputer">
											<div class="input-wrapper">
												<input type="text" name="judul_tempat" class="form-control" placeholder="Nama Tempat"  required>
											</div>
										</div>
									</div><!--.col-md-9-->
								</div><!--.row-->


								<div class="form-group">
									<div class="col-md-3">Informasi Tempat</div><!--.col-md-3-->
									<div class="col-md-9">
										<div class="inputer">
											<div class="input-wrapper">
												<textarea class="form-control" name="info_tempat" rows="3" placeholder="informasi tempat"></textarea>
											</div>
										</div>
									</div><!--.col-md-9-->
								</div><!--.row-->

								<div class="form-group">
									<div class="col-md-3">Kategori Tempat</div><!--.col-md-3-->
									<div class="col-md-9">
										<select class="selectpicker" required name="kategori_tempat">
											<option value=""  selected="selected" disabled="disabled">Pilih Kategori</option>
											<option value="area_pengunjung">area pengunjung</option>
											<option value="fasilitas">fasilitas</option>
											<option value="pemandangan">pemandangan</option>
										</select>
									</div><!--.col-md-9-->
								</div><!--.row-->		

								<div class="form-group">
									<div class="col-md-3">Foto Tempat</div><!--.col-md-3-->
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

								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-10">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</div>
								</div>																															
							</form>
						</div>

						</div><!--.panel-body-->
				</div>
</div>		
