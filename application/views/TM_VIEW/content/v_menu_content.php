<body>
	<a class="cd-nav-trigger cd-text-replace" style="position:fixed;" id="navmenu" href="#primary-nav">Menu<span aria-hidden="true" class="cd-icon"></span></a>
	<section id="beranda" class="backgrnd_section" style="background-image: url(<?php echo base_url();?>/assets/TM_Public/img/background-head/<?php echo $this->data['filename_photo'];?>); ">
			<div class="scroller">
				<div class="scroller-inner">
						</br></br></br></br>
						<header class="codrops-header text-center" id="header-title">
							<h1 class="animated fadeInDown"> <?php echo $this->data['info_judul_tm']; ?></h1>
							 <h2 class="animated fadeInUp delay-05s"><?php echo $this->data['info_ketjudul_tm']; ?></em></h2>
						</header>	
				</div>					
		</section>


	<div class="cd-projects-container">
		<div class="row">
			<?=$preview_menu;?>					
		</div>	

		<ul class="cd-projects-previews">
			<li>
				<a href="#1">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_1; ?></h2>
						<p><?php echo $ketjudul_page_1; ?></p>
					</div>
				</a>
			</li>

			<li>
				<a href="#2">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_2; ?></h2>
						<p><?php echo $ketjudul_page_2; ?></p>
					</div>
				</a>
			</li>
			
			<li>
				<a href="#3">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_3; ?></h2>
						<p><?php echo $ketjudul_page_3; ?></p>
					</div>
				</a>
			</li>
			
			<li>
				<a href="#4">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_4; ?></h2>
						<p><?php echo $judul_page_4; ?> </p>
					</div>
				</a>
			</li>
		</ul> 

		<ul class="cd-projects">
													
			<li>
				<div class="preview-image">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_1; ?></h2>
						<p></p>
					</div> 
				</div>

				<div class="cd-project-info"  id="konten_tentang_kita">
					<div class="row">
						<div class="col-md-7">
							<header class="codrops-header text-center margin-konten">
								<h3 class="animated fadeInLeftBig text-center"> Tentang</h3>
								 <p class="animated fadeInUp delay-05s text-left">
								 	<?php echo $this->data['info_tentang_tm']; ?> </p>
							</header>
						</div>
						<div class="col-md-5">
							<img class="animated fadeInUp delay-05s img-responsive center-block" src='<?php echo base_url();?>/assets/TM_Public/img/ihovertm.png'>
						</div>
					</div>	
				</div> 
			</li>


													
			<li>
				<div class="preview-image">

				</div>
				<div class="cd-project-info"  id="konten_galeri">

				</div> 
			</li>
													
									
			<li>
				<div class="preview-image">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_3; ?></h2>
						<p></p>
					</div> 
				</div>

				<div class="cd-project-info"  id="konten_daftar_menu">
					<div class="row">
							<?=$preview_menu;?>					
					</div>	
				</div> 

				<div class="cd-project-info"  id="konten_daftar_menu">
					<div class="row">
						<div id="cobaload"></div>
					</div>
				</div>
			</li>
													

													
			<li>
				<div class="preview-image">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_4; ?></h2>
						<p></p>
					</div> 
				</div>

				<div class="cd-project-info" id="konten_informasi_reservasi">
				<div class="row">
						<div class="col-md-12 text-center"> <h2> <?php echo $judul_page_4; ?></h2> </div>
						<div class="col-md-7">
							<header class="codrops-header text-center" id="header-title">
								<h3 class="text-center"> </h3>
								 <p></p>
							</header>
							<div class="center-block" id="map"></div>
						</div>

						</br>
						
						<div class="col-md-1"></div>
						<div class="col-md-4">
							<div class="media">
								</br></br></br></br></br></br></br>
								<div class="media-left media-middle text-center">
								      <i class="icon-inforsr icon-phone"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Telepon</h4>
								   <?php echo $this->data['info_telepon_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>
								<div class="media-left media-middle">
								     <i class="icon-inforsr icon-news"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Informasi</h4>
								   	 <?php echo $this->data['info_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>

								<div class="media-left media-middle text-center">
								      <i class="icon-inforsr icon-location"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Lokasi</h4>
								   <?php echo $this->data['info_lokasi_tm']; ?>
								</div>	
								<div class="konten-line-divider"></div>
							</div>

						</div>
						<div class="col-md-12"><div class="line-divider"></div>
						</div>
				</div>
				</div> 
			</li>
											
		</ul> 

		<button class="scroll cd-text-replace">Scroll</button>
	</div> 

	<nav class="cd-primary-nav" id="primary-nav">
		<ul>
			<li class="cd-label">Navigation</li>
			<li><a href="#1">The team</a></li>
			<li><a href="#2">Our services</a></li>
			<li><a href="#3">Our projects</a></li>
			<li><a href="#4">Contact us</a></li>
		</ul>
	</nav> 
</body>