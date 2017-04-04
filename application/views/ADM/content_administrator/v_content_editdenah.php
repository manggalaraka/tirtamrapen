<div class="row">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN GALERI</h4></div>
					</div><!--.panel-heading-->
						<div class="panel-body">

						<div class="col-md-12">
							<?php echo form_open_multipart('galeri_tm/#','class="form-horizontal parsley-validate"');?>
							<div class="form-body">
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<div id="rsr"> </div>
										</div>
									</div>
								</div>
							</form>	
							</div>
						</div>

				<!--Modal Edit-->
				<div class="modal scale fade full-height from-right" id="modal_edit_denah" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Kelola Denah</h4>
							</div>
							<div class="modal-body">
							
							<?php echo form_open_multipart('galeri_tm/act_denah','class="form-horizontal parsley-validate"');?>
							<div class="form-group">
								<div class="col-md-3">Id Denah</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" id="id_denah" name="nama_denah" class="form-control" readonly required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Galeri</div><!--.col-md-3-->
								<div class="col-md-9">
										<div class="input-wrapper">
											<select class="selectpicker" id="judul_galeri" name="nama_galeri" onchange="getid_galeri(this.id)" required>
											<?php if(!$data_galeri){ ?>
												<option value=""  selected="selected" disabled="disabled"> Tidak Ada Data</option>
											<?php }else{ ?> 
												    <option value=""  selected="selected" disabled="disabled"> Pilih Galeri</option>
												<?php foreach($data_galeri->result() as $hasil){ ?>
													<option value="<?php echo $hasil->id_galeri_tm; ?>"><?php echo $hasil->judul_galeri_tm; ?></option>
												<?php } ?>
											<?php } ?> 
											</select>
										</div>
								</div><!--.col-md-9-->
							</div><!--.row-->


							<div class="form-group">
								<div class="col-md-3"></div><!--.col-md-3-->
								<div class="col-md-9">
									<img id="img_galeri" src="<?php echo base_url();?>/assets/TM_Public/img/logo.png?>" width="200" height="170">
								</div>
							</div>


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


						</div>
				</div>
</div>		

	<script>
	function getid_galeri(id){
		var select_option = document.getElementById(id);
		var select_value = select_option.options[select_option.selectedIndex].value;
		var img_galeri = document.getElementById("img_galeri");

		var def_img_src = "<?php echo base_url();?>/assets/TM_Public/img/galeri_tm/";
		var get_photo = ("photo_"+select_value+".jpg").toString();

		img_galeri.src = def_img_src+get_photo;


	}
	</script>
