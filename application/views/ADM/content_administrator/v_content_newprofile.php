<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN PROFILE</h4></div>
					</div><!--.panel-heading-->
						<div class="panel-body">

						<!-- <form action="#" class="form-horizontal parsley-validate"> -->
						<?php echo form_open_multipart('profile_tm/act_profile_baru','class="form-horizontal parsley-validate"');?>
						<div class="form-body">

							<div class="row example-row">
								<div class="col-md-3">Judul</div><!--.col-md-3-->
								<div class="col-md-4">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="judul_profile" class="form-control" placeholder="Judul" minlength="10" maxlength="75" required>
										</div>
									</div>
								</div><!--.col-md-9-->
								<div class="col-md-5">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="ketjudul_profile" class="form-control" placeholder="Keterangan Judul">
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="row example-row">
								<div class="col-md-3">Info Tentang</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="tentang_profile" rows="3" placeholder="Tentang Tirta Mrapen" maxlength="1000" required></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="row example-row">
								<div class="col-md-3">Info Galeri</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="galeri_profile" rows="3" placeholder="Galeri Tirta Mrapen" maxlength="1000" required></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="row example-row">
								<div class="col-md-3">Telepon</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size" name="telp_profile" rows="1" placeholder="Telepon" maxlength="75" required></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="row example-row">
								<div class="col-md-3">Informasi</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size"  name="info_profile" rows="1" placeholder="Informasi" maxlength="200" required></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="row example-row">
								<div class="col-md-3">Lokasi</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control js-auto-size" name="lokasi_profile" rows="3" placeholder="Lokasi" maxlength="750" required></textarea>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="row example-row">
								<div class="col-md-3">Google Map</div><!--.col-md-3-->
								<div class="col-md-9">
								
									<div class="switcher switcher-light-blue form-inline">
										<input id="switcherColor7" type="checkbox" hidden="hidden" onclick="set_coordinare_default(this.id)">
										<label for="switcherColor7"></label>
									</div>

<!-- 									<div class="col-md-3">
										<input type="checkbox" class="bs-switch" data-on-text="Yes" data-off-text="No" id="gmap_set" onchange="set_coordinare_default(this.id)" checked >
									</div> -->

								</div>
								<div class="col-md-3"></div>
								<div class="col-md-3">
								<input type="number" step="any" name="gmap_lat_profile" id="gmap_lat_profile" class="form-control" placeholder="latitude" required>
									<!-- <div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="gmap_profile" rows="3" placeholder="Google Map Api Code" maxlength="500" required></textarea>
										</div>
									</div> -->
								</div><!--.col-md-9-->
								<div class="col-md-3">
									<input type="number" step="any" name="gmap_lng_profile" id="gmap_lng_profile" class="form-control" placeholder="langitude" required>
								</div>
								<div class="col-md-3">
									<input type="number" step="any" name="gmap_zoom_profile" id="gmap_zoom_profile" class="form-control" placeholder="zoom" required>
								</div>
							</div><!--.row-->

							<div class="row example-row">
								<div class="col-md-3">Background</div><!--.col-md-3-->
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
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="button" class="btn btn-default bv-reset">Batal</button>
									</div>
								</div>
							</div>
						</form>	
						</div>

						</div><!--.panel-body-->
				</div>
			</div>
</div>		


<!-- <button class="btn btn-default toastr-notify" data-toastr-close-others="true" data-toastr-position="toast-bottom-full-width">Bottom Full Width</button>
</br>
</br>
</br>

<div id="toast-container" class="toast-bottom-full-width" aria-live="polite" role="alert"> 
	<div class="toast toast-error">
		<button class="toast-close-button" role="button"><i class="ion-android-close"></i></button>
			<div class="toast-message"> Upload Profile Baru </div>
	</div>
</div> -->