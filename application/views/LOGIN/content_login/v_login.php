		<!-- Header -->
			<header id="header">
				<h1>LOGIN</h1>
				<p>  <a href="<?php echo site_url('home');?>"> Tirta Mrapen </a> Rumah Makan Ikan Bakar & Pemancingan</p>
			</header>

		<!-- Signup Form -->
			<?php $atribut_signup = array('id' => 'signup-form');
			echo form_open('login/login_form',$atribut_signup); ?>

			<!-- <form id="signup-form" method="post" action="#"> -->
				<input type="text" name="user" id="user" placeholder="Email / Username" /> </br>
				<input type="password" name="password" id="password" placeholder="password" /> </br>
				<input type="submit" value="Sign In" />
			</form>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; HTML5 UP</li> <li> <a href="<?php echo site_url('signup');?>"> SIGNUP </a></li>
				</ul>
			</footer>
