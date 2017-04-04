		<div class="row">
		<div class="panel">
			<div class="panel-body">


			
			<div class="row">
				<div class="col-md-1 col-xs-1"> </div>
				<div class="col-md-8 col-xs-8">
					  <div class="col-md-11 col-xs-11">
					    <div class="input-group">
					      <div class="input-group-btn">
					      <input type="text" placeholder="keyword pencarian.."  class="form-control" aria-label="..." id="pencarian_galeri">
					      <button type="button" class="btn btn-default dropdown-toggle" onclick="go_galeri_search()" aria-haspopup="true" aria-expanded="false">Cari <span class="caret"></span></button>
					      </div>	
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
				</div>	
				<div class="col-md-2 col-xs-2">
				    <div id="show_paginator">
				    	<div class="form-group">
						  <select class="form-control" id="halaman_galeri" onchange="galeri_go_to_page('halaman_galeri','galeri')">
						    <?php $nomer=0; $dt_total = count($conf_paging_galeri); for($nilai=0; $nilai<$dt_total; $nilai++){ $nomer++?>
								<option value="<?php echo $nilai; ?>"><?php echo $nomer; ?></option>
							<?php } ?>
						  </select>
						</div>
				    </div>
			    </div>
				<div class="col-md-1 col-xs-1"> </div>
			</div>  

			<div id="dynamic_content_galeri"></div>
		
			
			</div>
		</div>
		</div>	



			<!-- Modal -->
			<div id="modal_preview_denah" class="modal fade bs-example-modal-lg" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" id="denah_title"></h4>
			      </div>
			      <div class="modal-body">
			        <img id="denah_img" width="500" height="400">
			         	<div class="caption">
			         	 	<h3 id="denah_judul"></h3>
        					<p id="denah_info"></p>
      					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>	

