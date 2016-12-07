<?php $newData = $data['records'][0]; ?>
<?php
$attributes = array("name" => "edituserform");
echo form_open("user/edituser/". $newData->id, $attributes);
?>


<?php echo $this->session->flashdata('msg'); ?>
<?php echo $this->session->flashdata('verify_msg'); ?>

    <div id="new-training" class="card">
        <div class="card-header">
            <h2>Gebruiker bewerken
                <small>Hier kunt u de geselecteerde gebruiker bewerken.</small>
            </h2>
        </div>

        <div class="card-body card-padding">

            <div class="input-group">
                <input class="form-control" type="hidden" name="id" value="<?php echo $newData->id; ?>"/>
            </div>

            <div class="input-group">
                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                    <input type="text" name="username" class="form-control" value="<?php echo $newData->username; ?>">
                </div>

            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="fg-line">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                        <div class="select">
                            <select class="form-control" name="auth">
                                <option value="<?php if($newData->auth == 'admin') { echo 'admin' ;} else { echo 'admin'; } ?>"<?php if($newData->auth == 'admin') { echo 'selected'; } else { echo ''; } ?>>Beheerder</option>
                                <option value="<?php if($newData->auth == 'mod') { echo 'mod' ;} else { echo 'mod'; } ?>"<?php if($newData->auth == 'mod') { echo 'selected'; } else { echo ''; } ?>>Trainer</option>
                                <option value="<?php if($newData->auth == 'basic') { echo 'basic' ;} else { echo 'basic'; } ?>"<?php if($newData->auth == 'basic') { echo 'selected'; } else { echo ''; } ?>>Standaard</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="fg-line">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>

                        <div class="select">
                            <select class="form-control" name="status">
                                <option value="<?php if($newData->status == '1') { echo '1' ;} else { echo '1'; } ?>"<?php if($newData->status == '1') { echo 'selected'; } ?>>Geactiveerd</option>
                                <option value="<?php if($newData->status == '0') { echo '0' ;} else { echo '0'; } ?>"<?php if($newData->status == '0') { echo 'selected'; } ?>>Gedeactiveerd</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button id="submit-button" type="submit" class="btn btn-primary btn-sm waves-effect">Bewerken</button>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>