<?php echo form_open("menu/shop", array("name" => "shop", "class" => "jsform")); ?>

<?php echo $this->session->flashdata('msg'); ?>
<?php echo $this->session->flashdata('verify_msg'); ?>

    <div id="buy-stuff" class="card">
        <div class="card-header">
            <h2>Winkel
                <small>Hier kunt u een veld invullen om het artikel te bestellen.</small>
            </h2>
        </div>

        <div class="card-body card-padding">

            <div class="input-group">
                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="input-group">
                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="text" name="description" class="form-control" placeholder="Artikelnaam">
                </div>
            </div>

            <div class="form-group">
                <button id="submit-button" type="submit" class="btn btn-primary btn-sm waves-effect">Bestellen</button>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>