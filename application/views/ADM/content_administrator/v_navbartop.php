<div class="content">

		<div class="page-header full-content">
			<div class="row">
				<div class="col-sm-6">
					<h1><?php $opening = $this->session->flashdata('greeting'); 
						if(!empty($opening)){ echo $opening;}else{echo $judul;}?>
					</h1>
				</div><!--.col-->
				<div class="col-sm-6">
					<ol class="breadcrumb">
						<li><a href="<?php echo site_url('administrator');?>"><i class="ion-home"></i></a></li>
						<?php if($this->uri->segment(2) != null ) { ?>
						<li><a href="<?php current_url();?>"><?php echo $judul ?></a></li>
						<?php } ?>
					</ol>
				</div><!--.col-->
			</div><!--.row-->
		</div><!--.page-header-->

		<!-- content -->
		<!-- content -->

		<?=$content_page?>
		<?php echo $this->data['content_report_successornot']; ?>


</div><!--.content-->
