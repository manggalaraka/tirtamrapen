<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>TIRTA MRAPEN DAFTAR MENU</h4></div>
					</div><!--.panel-heading-->
						<div class="panel-body">

						<!-- <form action="#" class="form-horizontal parsley-validate"> -->
						<?php echo form_open_multipart('menu_tm/act_menu_baru','class="form-horizontal parsley-validate"');?>
						<div class="form-body">
							<?php echo validation_errors(); ?>
							<div class="form-group">
								<div class="col-md-3">Nama Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"  required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Jenis Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<select class="selectpicker" onchange="set_kategori(this.id)" id="jenis_menu" required name="jenis_menu">
										<option value="" selected="selected" disabled="disabled">Pilih Jenis</option>
										<option value="makanan" data-icon="fa fa-cutlery">Makanan</option>
										<option value="minuman" data-icon="glyphicon-glass">Minuman</option>
									</select>
								</div><!--.col-md-9-->
							</div><!--.row-->
							

							<div class="form-group">
								<div class="col-md-3">Kategori Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<select class="selectpicker" required name="kategori_menu">
										<option value=""  selected="selected" disabled="disabled">Pilih Kategori</option>
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
											<input type="number" name="harga_menu" class="form-control" placeholder="Harga Menu" minlength="4" required>
										</div>
									</div>
								</div><!--.col-md-9-->
							</div><!--.row-->

							<div class="form-group">
								<div class="col-md-3">Keterangan Menu</div><!--.col-md-3-->
								<div class="col-md-9">
									<div class="inputer">
										<div class="input-wrapper">
											<textarea class="form-control" name="ket_menu" rows="3" placeholder="Keterangan Menu" maxlength="1000"></textarea>
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