		<div class="row">
		<div class="panel">
			<div class="panel-body">


			
			<div class="row">
				<div class="col-md-1 col-xs-1"> </div>
				<div class="col-md-9 col-xs-9">
					  <div class="col-md-11 col-xs-11">
					    <div class="input-group">
					      <div class="input-group-btn">
					      <input type="text" placeholder="keyword pencarian.."  class="form-control" aria-label="..." id="pencarian_menu">
					      <button type="button" class="btn btn-default dropdown-toggle" onclick="go_menu_search()" aria-haspopup="true" aria-expanded="false">Cari <span class="caret"></span></button>
					      </div>	
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
				</div>	
				
				<div class="col-md-2 col-xs-2"> </div>
			</div>  


			<div id="dynamic_content"></div>

			<div class="row">
				</br></br>
				<!-- <div class="col-md-7 col-xs-8"></div> -->
				<div class="col-md-offset-9 col-xs-offset-6 col-md-2 col-xs-5">
					<label> Halaman </label></br></br>
				    <div id="show_paginator">
				    	<div class="form-group">
						  <select class="form-control" id="halaman_menu" onchange="go_to_page('halaman_menu','menu')">
						    <?php $nomer=0; $dt_total = count($conf_paging_menu); for($nilai=0; $nilai<$dt_total; $nilai++){ $nomer++?>
								<option value="<?php echo $nilai; ?>"><?php echo $nomer; ?></option>
							<?php } ?>
						  </select>
						</div>
				    </div>
			    </div>
			    <!-- <div class="col-md-1 col-xs-1"> </div> -->
			</div>


			<div id="preview_menu_modal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">
				<div class="modal-body">
					<div class="overlay-modal-defmenu">
					<div class="col-md-12 ovly">
						<a class="close-custom" data-dismiss="modal"><i class="glyphicon glyphicon-remove" data-dismiss="modal"></i> </a>
						<div class="col-md-8 col-xs-12">
							<div class="overlay-modal-img">
								<img id="foto_modal_menu" class="img-responsive">
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<div class="overlay-modal-info">
								 <h4 id="judul_modal_menu" class="list-group-item-heading text-center"></h4>
								 </br></br>
								 <p class="list-group-item-text" id="info_modal_menu"></p>
							</div>
						</div>
					</div>
					</div>		
				</div>					    
			</div>

			</div>
		</div>
		</div>	
