<?php 
echo json_encode($data_paging);
?>
<div class="form-group">
  <label for="sel1">halaman</label> 
  <select class="form-control" id="sel1">
  	<?php $nomer=0; $dt_total = count($data_paging); for($nilai=0; $nilai<$dt_total; $nilai++){ $nomer++?>
  		<option onclick="halaman('<?php echo $data_paging[$nilai]['quarter']; ?>','<?php echo $data_paging[$nilai]['offset']; ?>','<?php echo $data_paging[$nilai]['jumlah']; ?>')"><?php echo $nomer; ?></option>
  	<?php } ?>
  </select>
</div>

</br>
</br>
</br>
</br>


<nav>
  <ul class="pagination" data-pagination-control="true" data-pagination-arrow="disabled">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php $no=0; $jumlah_queque = count($data_paging1);
			for($i=0; $i<$jumlah_queque; $i++){
				$jumlah_data = count($data_paging1[$i]);
				for($b=0; $b<$jumlah_data; $b++){ $no++?>
 				<li><a href="#" onclick="pagination('<?php echo $data_paging1[$i][$b]['offset'];?>','<?php echo $data_paging1[$i][$b]['jumlah'];?>')"><?php echo $no; ?></a></li>
	<?php	
				}	
			}    
	 ?>

    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<?php

	$jumlah_queque = count($data_paging1);
		for($i=0; $i<$jumlah_queque; $i++){
			$jumlah_data = count($data_paging1[$i]);
			for($b=0; $b<$jumlah_data; $b++){
				echo "antrian = ".$i.
					 " quarter = ".$data_paging1[$i][$b]['quarter'].
					 " offset = ".$data_paging1[$i][$b]['offset'].
					 " jumlah = ".$data_paging1[$i][$b]['jumlah']."</br>";
			}
		}
?>

	</br></br></br>

			<div class="row">
				</br></br></br>
				<div class="col-md-1"> </div>
				<div class="col-md-10">
					<div id="dynamic_content">
					<?php foreach($data_menu->result() as $hasil){ ?>
						<div class="col-md-3 col-xs-4">
							<div class="ratio-custom img-responsive-custom img-circle-custom" style="background-image:url(<?php echo base_url();?>/assets/TM_Public/img/menu_tm/<?php echo $hasil->foto_menu_tm ?>)"> 	
								</br></br></br></br></br></br></br></br></br></br></br></br></br></br>
								<h4 class="text-center">
									<span class="label-custom label-warning"><?php echo $hasil->nama_menu_tm;?></span>
								</h4>									
							</div>
						</div>	
					<?php } ?>
					</div>
				</div>	
				<div class="col-md-1"> </div>
			</div>


	</br></br></br>
			  <div class="row">
				<div class="col-md-1"> </div>
				<div class="col-md-8">
					  <div class="col-md-11">
					    <div class="input-group">
					      <div class="input-group-btn">
					      <input type="text" placeholder="keyword pencarian.."  class="form-control" aria-label="...">
					      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cari <span class="caret"></span></button>
					      </div>	
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
				</div>	
				<div class="col-md-2">
				    <div id="show_paginator">
				    	<div class="form-group">
						  <select class="form-control" id="halaman" onchange="go_to_page(this.id)">
						    <?php $nomer=0; $dt_total = count($conf_paging); for($nilai=0; $nilai<$dt_total; $nilai++){ $nomer++?>
								<option value="<?php echo $nilai; ?>"><?php echo $nomer; ?></option>
							<?php } ?>
						  </select>
						</div>
				    </div>
			    </div>
				<div class="col-md-1"> </div>
			  </div> 			
	
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/TM_Public/js/bootstrap.js"></script>
	
	<script>
 	var jsvar = <?php echo json_encode($data_paging1); ?>;
 	var get_total =jsvar.length;
 	var get_page = document.getElementById('demo');


	var navpag = document.createElement("nav");
	var ulpag = document.createElement("ul");
	ulpag.className = "pagination";
	var lipag = document.createElement("li");

	var a_nextprev = document.createElement("a"); 
	var attr_prev = a_nextprev.setAttribute("aria-label","Previous");
	var attr_next = a_nextprev.setAttribute("aria-label","next");

	

	// lipag.appendChild(a_nextprev).attr_next;
	ulpag.appendChild(lipag);
	navpag.appendChild(ulpag);
	get_page.appendChild(navpag);

	 ul.appendChild(li).setAttribute("aria-label","Previous");
	 ul.appendChild(li).setAttribute("aria-label","next");
	// jQuery(document).ready(function($){
	// 	getpaging = $('#demo');
	// 	getpaging.append(conf);
	// });
 	
 	function fungsiku(){
 		get_state = document.getElementById("state").innerHTML;
 		return parseInt(get_state);
 	}

 	function next(){
 		var get = fungsiku();
 		var limit_atas = 5;
 		var get_state_now = get+1;
 		if(limit_atas>=get_state_now){
	 		document.getElementById("state").innerHTML = get_state_now;
 		}
 	}

 	function prev(){
 		var get = fungsiku();
 		var limit_bawah = 0; 

 		var get_state_now = get-1;
		if(limit_bawah<=get_state_now){
	 		document.getElementById("state").innerHTML = get_state_now;
 		}
 	}

function go_to_page(id){
		get_id_selectoption = document.getElementById(id);
		var selectedValue = get_id_selectoption.options[get_id_selectoption.selectedIndex].value;

		var arraydata = <?php echo json_encode($conf_paging); ?>;
		var get_data_quarter = arraydata[selectedValue]['quarter'];
		var get_data_offset = arraydata[selectedValue]['offset'];
		var get_data_max = arraydata[selectedValue]['jumlah'];

		get_data_page(get_data_quarter,get_data_offset,get_data_max);
		// alert(get_data_quarter+" "+get_data_offset+" "+get_data_max);
	}

	function get_data_page(quarter,offset,max){
	    $.ajax({
	      type: "get",
	      url: "<?php echo site_url('/home/preview_menu1')?>",
	      data: {'offset':offset,
                 'max':max},
	      cache:"false",
	      //dataType: "json",
	      dataType: "text",
	      success: function(result){
	      	alert(result);
	      	
	      },
	        error: function(data) {
	           alert("error");
	        }
	    });  
	}	
	
	</script>
</html>
