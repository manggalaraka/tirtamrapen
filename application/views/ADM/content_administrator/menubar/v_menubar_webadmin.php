<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
				<li>
					<a href="<?php echo site_url('administrator');?>" data-open-after="true">Dashboard</a>
				</li>
				<li>
					<a href="javascript:;">Profile Tirta Mrapen</a>
					<ul class="child-menu">
						<li><a href="<?php echo site_url('administrator/profile_baru');?>">Profile Baru</a></li>
						<li><a href="<?php echo site_url('administrator/profile_kelola');?>">Kelola Profile</a></li>
						<li><a href="<?php echo site_url('administrator/profile_photoheader');?>">Kelola Foto Dashboard</a></li>
<!-- 						<li>
							<a href="javascript:;">Foto Dashboard</a>
							<ul class="child-menu">
								<li><a href="<?php echo site_url('administrator/upload_profile_photoheader');?>">Foto Baru</a></li>
								<li><a href="<?php echo site_url('administrator/profile_photoheader');?>">Kelola Foto</a></li>
							</ul>
						</li> -->
					</ul>
				</li>
				<li>
					<a href="javascript:;">Galeri</a>
					<ul class="child-menu">
						<li><a href="<?php echo site_url('administrator/galeri_baru');?>">Galeri Baru</a></li>
						<li><a href="<?php echo site_url('administrator/galeri_kelola');?>">Kelola Galeri</a></li>
						<li><a href="<?php echo site_url('administrator/galeri_denah');?>">Kelola Denah</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">Menu</a>
					<ul class="child-menu">
						<li><a href="<?php echo site_url('administrator/menu_baru');?>">Menu Baru</a></li>
						<li><a href="<?php echo site_url('administrator/menu_kelola');?>">Kelola Menu</a></li>
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url('login/logout');?>"> Logout</a>
				</li>
			</ul>
		</div><!--.menu-layer-->
<!-- END OF MENU LAYER -->