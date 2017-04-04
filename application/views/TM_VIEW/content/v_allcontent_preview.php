<!-- <body>
		<div id="page">
				<section id="beranda" class="backgrnd_section" style="background-image: url(<?php echo base_url();?>/assets/TM_Public/img/background-head/<?php echo $content_preview['preview_filename_photo'];?>); ">
					<div class="scroller">
						<div class="scroller-inner">
							<div class="clearfix" style="position:fixed; z-index:1;" id="mainmenu">
									<a id="hamburger" href="#menu">
									   <span class="top-bar"></span>
									   <span class="middle-bar"></span>
									   <span class="bottom-bar"></span>
									</a>
							</div>
									</br></br></br></br>
									<header class="codrops-header text-center" id="header-title">
										<h1 class="animated fadeInDown"> <?php echo $content_preview['preview_info_judul_tm']; ?></h1>
										 <h2 class="animated fadeInUp delay-05s"><?php echo $content_preview['preview_info_ketjudul_tm']; ?></em></h2>
									</header>		
					</div>					
				</section>
				<div  class="backgrnd_section2" style="background-image: url<?php echo base_url();?>/assets/TM_Public/img/background-image/cream_dust.png);"> 
				<section id="tentang">
						<div class="col-md-7">
							<header class="codrops-header text-center margin-konten">
								<h3 class="animated fadeInLeftBig text-center"> Tentang</h3>
								 <p class="animated fadeInUp delay-05s text-left">
								 	<?php echo $content_preview['preview_info_tentang_tm']; ?>
							</header>
						</div>

						<div class="col-md-5">
							<img class="animated fadeInUp delay-05s img-responsive center-block" src='<?php echo base_url();?>/assets/TM_Public/img/ihovertm.png'>
						</div>

						<div class="col-md-12"><div class="line-divider"></div></div>
				</section>


				<section id="daftar_menu"  class="animated fadeInLeftBig">
						<div class="col-md-12">
							<header class="codrops-header text-center" id="header-title">
								<h3 class="animated fadeInDown">Daftar Menu</h3>
							</header>
						</div>

						<div class="col-md-4"> <div class="konten-blok center-block"></div> </div>
						<div class="col-md-4"> <div class="konten-blok center-block"></div> </div>
						<div class="col-md-4"> <div class="konten-blok center-block"></div> </div>

						<div class="col-md-12"><div class="line-divider"></div></div>

				</section>
				<section id="galeri">
					</br></br>
					<div class="col-md-1"></div>
					<div class="col-md-7">
					</br></br>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>

						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src='<?php echo base_url();?>/assets/TM_Public/img/image1.jpg' alt="Chania">
						    </div>

						    <div class="item">
						      <img src='<?php echo base_url();?>/assets/TM_Public/img/image1.jpg' alt="Chania">
						    </div>

						    <div class="item">
						      <img src='<?php echo base_url();?>/assets/TM_Public/img/cover-img.jpeg' alt="Flower">
						    </div>
						  </div>

						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<div class="col-md-4">
							<header class="codrops-header text-center" id="header-title">
								<h3 class="animated fadeInDown text-center"> Galeri</h3>
								 <p class="animated fadeInUp delay-05s">
								 	<?php echo $content_preview['preview_info_galeri_tm']; ?>
								</p>
							</header>
					</div>
						<div class="col-md-12"><div class="line-divider"></div></div>
				</section>
				<section id="inforsv" class="animated fadeInUp delay-05s">
						<div class="col-md-12 text-center"> <h2> Info dan Reservasi</h2> </div>
						<div class="col-md-7">
							<header class="codrops-header text-center" id="header-title">
								<h3 class="text-center"> Lokasi </h3>
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
								<div class="media-body">
								    <h4 class="media-heading">Telepon</h4>
								   <?php echo $content_preview['preview_info_telepon_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>
								<div class="media-left media-middle">
								     <i class="icon-inforsr icon-news"></i>
								</div>
								<div class="media-body">
								    <h4 class="media-heading">Informasi</h4>
								   <?php echo $content_preview['preview_info_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>

								<div class="media-left media-middle text-center">
								      <i class="icon-inforsr icon-location"></i>
								</div>
								<div class="media-body">
								    <h4 class="media-heading">Lokasi</h4>
								   <?php echo $content_preview['preview_info_lokasi_tm']; ?>
								</div>	
								<div class="konten-line-divider"></div>
							</div>

						</div>
						<div class="col-md-12"><div class="line-divider"></div>
						</div>
				</section>											
				</div>


			<nav id="menu">
				<ul>
					<li><a class="icon icon-shop" href="#beranda">Home</a></li>
					<li><a class="icon icon-note" href="#tentang">Tentang</a></li>
					<li><a class="icon icon-food" href="#daftar_menu">Daftar Menu </a>
						<ul>
							<li><a href="#daftar_menu/makanan">Makanan</a>
								<ul>
									<li><a href="#daftar_menu/makanan/seafood">Seafood</a></li>
									<li><a href="#daftar_menu/makanan/non_seafood">Non Seafood</a></li>
									<li><a href="#daftar_menu/makanan/lain-lain">Lain - Lain</a></li>
								</ul>
							</li>
							<li><a href="#daftar_menu/minuman">Minuman</a></li>
						</ul>
					</li>
					<li><a class="icon icon-photo" href="#galeri">Galeri </a>
						<ul>
							<li> <a href="#galeri/denah"> Denah Area </a> </li>
							<li> <a href="#galeri/area_depan"> Area Depan </a> </li>
							<li> <a href="#galeri/area_belakang"> Area Belakang </a> </li>
						</ul>
					</li>
					<li><a class="icon icon-phone" href="#inforsv">Informasi dan Reservasi</a></li>
					<li><a class="icon icon-location" href="#lokasi">Lokasi</a></li>
				</ul>
			</nav>
		</div>
	</body>
 -->

<body>
	<a class="cd-nav-trigger cd-text-replace" style="position:fixed;" id="navmenu" href="#primary-nav">Menu<span aria-hidden="true" class="cd-icon"></span></a>

	<section id="beranda" class="backgrnd_section" style="background-image: url(<?php echo base_url();?>/assets/TM_Public/img/background-head/<?php echo $content_preview['preview_filename_photo'];?>); ">
			<div class="scroller">
				<div class="scroller-inner">
						</br></br></br></br>
						<header class="codrops-header text-center" id="header-title">
							<h1 class="animated fadeInDown"> <?php echo $content_preview['preview_info_judul_tm']; ?></h1>
							<h2 class="animated fadeInUp delay-05s"><?php echo $content_preview['preview_info_ketjudul_tm']; ?></em></h2>
						</header>	
				</div>					
	</section>


	<div class="cd-projects-container">
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
		</ul> <!-- .cd-projects-previews -->

		<ul class="cd-projects">


													<!-- KONTEN TENTANG -->
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
								 	<?php echo $content_preview['preview_info_tentang_tm']; ?> </p>
							</header>
						</div>
						<div class="col-md-5">
							<img class="animated fadeInUp delay-05s img-responsive center-block" src='<?php echo base_url();?>/assets/TM_Public/img/ihovertm.png'>
						</div>
					</div>	
				</div> 
			</li>

													<!-- KONTEN TENTANG -->






													<!-- KONTEN GALERI -->
			<li>
				<div class="preview-image">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_2; ?></h2>
						<p></p>
					</div> 
				</div>
				<div class="cd-project-info"  id="konten_galeri">
					<div class="row">
						<div class="col-md-5 col-xs-12">
							<div id="rsr"> </div>
						</div>
						<div class="col-xs-1"> </div>
						<div class="col-md-7 col-xs-11">
							<?=$preview_galeri;?>
						</div>					
					</div>
				</div> <!-- .cd-project-info -->
			</li>
													<!-- KONTEN GALERI-->






													<!-- KONTEN DAFTAR MENU -->
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
				</div> <!-- .cd-project-info -->

			</li>
													<!-- KONTEN DAFTAR MENU -->



													<!-- KONTEN INFO RESERVASI -->
			<li>
				<div class="preview-image">
					<div class="cd-project-title">
						<h2><?php echo $judul_page_4; ?></h2>
						<p></p>
					</div> 
				</div>

				<div class="cd-project-info">
				<div class="row">
						<div class="col-md-12 text-center"> <h2> <?php echo $judul_page_4; ?></h2> </div>
						<div class="col-md-1"></div>
						<div class="col-md-7 col-xs-12">
							<header class="codrops-header text-center" id="header-title">
								<h3 class="text-center">  </h3>
								 <p></p>
							</header>
							<div id="map"></div>
						</div>

						</br>
						<div class="col-xs-2"></div>
						<div class="col-md-3 col-xs-10">
							<div class="media">
								</br></br></br></br></br></br></br>
								<div class="media-left media-middle text-center">
								      <i class="icon-inforsr icon-phone"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Telepon</h4>
								   <?php echo $content_preview['preview_info_telepon_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>
								<div class="media-left media-middle">
								     <i class="icon-inforsr icon-news"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Informasi</h4>
								   	  <?php echo $content_preview['preview_info_tm']; ?>
								</div>
								<div class="konten-line-divider"></div>

								<div class="media-left media-middle text-center">
								      <i class="icon-inforsr icon-location"></i>
								</div>
								<div class="media-body info-resvs">
								    <h4 class="media-heading">Lokasi</h4>
								   <?php echo $content_preview['preview_info_lokasi_tm']; ?>
								</div>	
								<div class="konten-line-divider"></div>
							</div>

						</div>
						<div class="col-md-12"><div class="line-divider"></div>
						</div>
				</div>
				</div> <!-- .cd-project-info -->
			</li>
											<!-- KONTEN INFO RESERVASI -->




		</ul> <!-- .cd-projects -->

		<button class="scroll cd-text-replace">Scroll</button>
	</div> <!-- .cd-project-container -->

	<nav class="cd-primary-nav" id="primary-nav">
		<ul>
			<li class="cd-label">Navigation</li>
			<li><a href="#1">The team</a></li>
			<li><a href="#2">Our services</a></li>
			<li><a href="#3">Our projects</a></li>
			<li><a href="#4">Contact us</a></li>
		</ul>
	</nav> <!-- .cd-primary-nav -->
</body>	