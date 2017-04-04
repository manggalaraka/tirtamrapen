	
	<div class="layer-container">

		<!-- BEGIN USER LAYER -->
		<div class="user-layer">
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li class="active"><a href="#messages" data-toggle="tab">Messages</a></li>
				<li><a href="#notifications" data-toggle="tab">Notifications <span class="badge">3</span></a></li>
				<li><a href="#settings" data-toggle="tab">Settings</a></li>
			</ul>

			<div class="row no-gutters tab-content">
					<?=$this->data['content_message']?>
					<?=$this->data['content_notif']?>
					<?=$this->data['content_setting']?>

			</div><!--.row-->
		</div><!--.user-layer-->
		<!-- END OF USER LAYER -->

		<?=$this->data['content_menubar']?>
		<?=$this->data['content_search']?>

	</div><!--.layer-container-->
