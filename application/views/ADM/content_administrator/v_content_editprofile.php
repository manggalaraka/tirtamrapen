<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN KELOLA PROFILE</h4></div>
					</div>
						<div class="panel-body">


						<?php echo form_open_multipart('profile_tm/#','class="form-horizontal parsley-validate"');?>
						<div class="form-body">
						<?php foreach($data_edit_profile->result() as $hasil){?>

							<div class="row example-row">
								<div class="col-md-3">Judul</div>
								<div class="col-md-4">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" value="<?php echo $hasil->info_judul_tm; ?>" id="judul_profile" name="judul_profile" class="form-control" placeholder="Judul" minlength="10" maxlength="75" required>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" value="<?php echo $hasil->info_ketjudul_tm; ?>" name="ketjudul_profile" class="form-control" placeholder="Keterangan Judul">
										</div>
									</div>
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Info Tentang</div>
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="tentang_profile" rows="3" placeholder="Tentang Tirta Mrapen" maxlength="1000" required><?php echo $hasil->info_tentang_tm; ?></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Info Galeri</div>
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control"  name="galeri_profile" rows="3" placeholder="Galeri Tirta Mrapen" maxlength="1000" required><?php echo $hasil->info_galeri_tm; ?></textarea>
										</div>
									</div>
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Telepon</div>
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size"  name="telp_profile" rows="1" placeholder="Telepon" maxlength="75" required><?php echo $hasil->info_telepon_tm; ?></textarea>
										</div>
									</div>
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Informasi</div>
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size" name="info_profile" rows="1" placeholder="Informasi" maxlength="200" required><?php echo $hasil->info_tm; ?></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Lokasi</div>
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size" name="lokasi_profile" rows="3" placeholder="Lokasi" maxlength="750" required><?php echo $hasil->info_lokasi_tm; ?></textarea>
										</div>
									</div>
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Google Map</div>
								<div class="col-md-9">
								
									<div class="switcher switcher-light-blue form-inline">
										<input id="switcherColor7" type="checkbox" hidden="hidden" onclick="set_coordinare_default(this.id)">
										<label for="switcherColor7"></label>
									</div>

								</div>
								<div class="col-md-3"></div>
								<div class="col-md-3">
								<input type="number" step="any" value="<?php echo $hasil->gmap_lat_tm; ?>" name="gmap_lat_profile" id="gmap_lat_profile" class="form-control" placeholder="latitude" required>
								</div>
								<div class="col-md-3">
									<input type="number" step="any" value="<?php echo $hasil->gmap_lng_tm; ?>" name="gmap_lng_profile" id="gmap_lng_profile" class="form-control" placeholder="langitude" required>
								</div>
								<div class="col-md-3">
									<input type="number" step="any" value="<?php echo $hasil->gmap_zoom_tm; ?>"  name="gmap_zoom_profile" id="gmap_zoom_profile" class="form-control" placeholder="zoom" required>
								</div>
							</div>

							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="button" id="<?php echo "simpan_profile_".$hasil->id_profile_tm;?>" class="btn btn-primary" onclick="editprofile_all(this.id)">Simpan</button>
										<button type="button" id="<?php echo "preview_profile_".$hasil->id_profile_tm;?>"  class="btn btn-info bv-reset" onclick="previewprofile_all(this.id)">Preview</button>
									</div>
								</div>
							</div>
						</form>	
						</div>
						<?php } ?>
						</div>
				</div>
			</div>
</div>		

<!-- <div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN KELOLA PROFILE</h4></div>
					</div>
						<div class="panel-body">


						<?php echo form_open_multipart('profile_tm/#','class="form-horizontal parsley-validate"');?>
						<div class="form-body">
						<?php foreach($data_edit_profile->result() as $hasil){?>

							<div class="row example-row">
								<div class="col-md-3">Judul</div>
								<div class="col-md-4">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" value="<?php echo $hasil->info_judul_tm; ?>" id="judul_profile" name="judul_profile" class="form-control" placeholder="Judul" minlength="10" maxlength="75" required>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" value="<?php echo $hasil->info_ketjudul_tm; ?>" id="ketjudul_profile" name="ketjudul_profile" class="form-control" placeholder="Keterangan Judul">
										</div>
									</div>
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Info Tentang</div>
								<div class="col-md-9">
									<div class="summernote summernote-default" id="tentang_profile">
											<?php echo $hasil->info_tentang_tm; ?>
									</div>
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Info Galeri</div>
								<div class="col-md-9">
									<div class="summernote summernote-default" id="galeri_profile">
											<?php echo $hasil->info_galeri_tm; ?>
									</div>									
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Telepon</div>
								<div class="col-md-9">
									<div class="summernote summernote-default" id="telp_profile">
											<?php echo $hasil->info_telepon_tm; ?>
									</div>										
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Informasi</div>
								<div class="col-md-9">
									<div class="summernote summernote-default" id="info_profile">
											<?php echo $hasil->info_tm; ?>
									</div>										
								</div>
							</div>

							<div class="row example-row">
								<div class="col-md-3">Lokasi</div>
								<div class="col-md-9">
									<div class="summernote summernote-default" id="lokasi_profile">
											<?php echo $hasil->info_lokasi_tm; ?>
									</div>										
								</div>
							</div>


							<div class="row example-row">
								<div class="col-md-3">Google Map</div>
								<div class="col-md-9">
								
									<div class="switcher switcher-light-blue form-inline">
										<input id="switcherColor7" type="checkbox" hidden="hidden" onclick="set_coordinare_default(this.id)">
										<label for="switcherColor7"></label>
									</div>

								</div>
								<div class="col-md-3"></div>
								<div class="col-md-3">
								<input type="number" step="any" value="<?php echo $hasil->gmap_lat_tm; ?>" name="gmap_lat_profile" id="gmap_lat_profile" class="form-control" placeholder="latitude" required>
								</div>
								<div class="col-md-3">
									<input type="number" step="any" value="<?php echo $hasil->gmap_lng_tm; ?>" name="gmap_lng_profile" id="gmap_lng_profile" class="form-control" placeholder="langitude" required>
								</div>
								<div class="col-md-3">
									<input type="number" step="any" value="<?php echo $hasil->gmap_zoom_tm; ?>"  name="gmap_zoom_profile" id="gmap_zoom_profile" class="form-control" placeholder="zoom" required>
								</div>
							</div>

							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="button" id="<?php echo "simpan_profile_".$hasil->id_profile_tm;?>" class="btn btn-primary" onclick="editprofile_all(this.id)">Simpan</button>
										<button type="button" id="<?php echo "preview_profile_".$hasil->id_profile_tm;?>"  class="btn btn-info bv-reset" onclick="previewprofile_all(this.id)">Preview</button>
									</div>
								</div>
							</div>
						</form>	
						</div>
						<?php } ?>
						</div>
				</div>
			</div>
</div>		 -->

