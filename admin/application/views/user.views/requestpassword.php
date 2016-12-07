<div id="requestpass-form" class="reglogin">
    <?php
    $attributes = array("name" => "requestpasswordform");
    echo form_open("user/requestpassword", $attributes);
    ?>

    <?php echo $this->session->flashdata('msg'); ?>

    <div class="input-group">

        <div class="fg-line">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            <input type="text" class="form-control" placeholder="Email adres" name="email" maxlength="128">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>
    </div>

    <button id="submit-button" class="btn btn-primary btn-sm hec-button" type="submit">Verander Wachtwoord</button>

    <?php echo form_close(); ?>
</div>