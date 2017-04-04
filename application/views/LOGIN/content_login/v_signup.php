		<!-- Header -->
			<header id="header">
				<h1>SIGNUP</h1>
				<p>  <a href="<?php echo site_url('home');?>"> Tirta Mrapen </a> Rumah Makan Ikan Bakar & Pemancingan</p>
			</header>

		<!-- Signup Form -->
			<?php $atribut_signup = array('id' => 'signup-form');
			echo form_open_multipart('login/login_form',$atribut_signup); ?>
			<form id="signup-form" method="post" action="#">
				<input type="email" name="email" id="email" placeholder="Email" /> </br>
				<input type="email" name="email" id="email" placeholder="Username" /> </br>
				<input type="password" name="password" id="password" placeholder="Password"/> </br>
				<input type="password" name="password" id="password" placeholder="Ulangi Password"/> </br>
				<input type="submit" value="Sign In" /></br>
			</form>

		<!-- Footer -->
			<footer id="footer">
				<ul class="copyright">
					<li>&copy; HTML5 UP</li> <li> <a href="<?php echo site_url('login');?>"> LOGIN </a></li>
				</ul>
			</footer>
