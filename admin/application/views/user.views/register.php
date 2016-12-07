<div id="register-form" class="reglogin">
	<?php 
	$attributes = array("name" => "registrationform");
    echo form_open("user/register", $attributes);
    ?>

	<?php echo $this->session->flashdata('msg'); ?>

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
			<input type="password" type="text" class="form-control" placeholder="Wachtwoord" name="password" maxlength="64">
			<span class="text-danger"><?php echo form_error('password'); ?></span>
		</div>
	</div>

	<div class="input-group">
		
		<div class="fg-line">
			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			<input type="password" type="text" class="form-control" placeholder="Herhaal wachtwoord" name="passconf" maxlength="64">
			<span class="text-danger"><?php echo form_error('passconf'); ?></span>
		</div>
	</div>

	<div class="input-group">
		
		<div class="fg-line">
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
			<input type="text" class="form-control" placeholder="Email adres" name="email" maxlength="64" value="<?php echo set_value('email'); ?>">
			<span class="text-danger"><?php echo form_error('email'); ?></span>
		</div>
	</div>

	<button id="submit-button" class="btn btn-primary btn-sm hec-button" type="submit">Registreren!</button>

	 <?php echo form_close(); ?>
	 
	 <a href="<?php echo BASE_HREF; ?>user/login">Heeft u al een account? Klik dan hier om in te loggen.</a>
</div>
