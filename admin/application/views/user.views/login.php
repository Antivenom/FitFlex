<div id="login-form" class="reglogin">

	<?php
	$attributes = array("name" => "loginform");
	echo form_open("user/login", $attributes);
	?>

	<?php echo $this->session->flashdata('msg'); ?>
	<?php echo $this->session->flashdata('verify_msg'); ?>

	<div class="input-group">
		
		<div class="fg-line">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			<input type="text" class="form-control" placeholder="Gebruikersnaam" name="username" maxlength="64" value="<?php echo set_value('username'); ?>">
			<span class="text-danger"><?php echo form_error('username'); ?></span>
		</div>
	</div>
	
	<div class="input-group">
		
		<div class="fg-line">
			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			<input type="password" name="password" maxlength="64" class="form-control" placeholder="Wachtwoord">
			<span class="text-danger"><?php echo form_error('password'); ?></span>
		</div>
	</div>

	<button id="submit-button" class="btn btn-primary btn-sm hec-button" type="submit">Login</button>

	 <?php echo form_close(); ?>
	 
	<a href="<?php echo BASE_HREF; ?>user/requestpassword">Wachtwoord vergeten? Klik hier om uw wachtwoord op te vragen.</a>
</div>
