<?php 
if(isset($this->session->userdata['logged_in'])):

	$username = $this->session->userdata['logged_in']['username'];
?>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/navbar.css">

<nav>
	
	<h2>FitFlex Moderator</h2>
<!-- 	<div id="logo-small">
		
		<div id="logo-border"></div>
	</div> -->

	<ul id="user-control">
		<li class="user-control-item">
			<a href="<?php echo BASE_HREF; ?>menu/manage">Beheer</a>
		</li>
		<li class="user-control-item name">
			<a href="#"><?php echo 'Hoi, ' . $username . '!'; ?></a>
		</li>
		<li class="user-control-item">
			<a href="<?php echo BASE_HREF; ?>user/logout">Uitloggen</a>
		</li>
	</ul>

</nav>
	
<?php endif; ?>