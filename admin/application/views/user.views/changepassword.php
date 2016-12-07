<div id="changepass-form" class="reglogin">
	<?php 
	$attributes = array("name" => "changepasswordform");
    echo form_open("user/changepassword", $attributes);
    ?>

	<?php echo $this->session->flashdata('msg'); ?>

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
			<input type="password" type="text" class="form-control" placeholder="Herhaal Wachtwoord" name="passconf" maxlength="64">
			<span class="text-danger"><?php echo form_error('passconf'); ?></span>
		</div>
	</div>

	<button id="submit-button" class="btn btn-primary btn-sm hec-button" type="submit">Verander Wachtwoord</button>

	 <?php echo form_close(); ?>
</div>