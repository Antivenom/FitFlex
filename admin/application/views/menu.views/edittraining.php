<?php $newData = $data['records'][0]; ?>
<?php
$attributes = array("name" => "edittrainingform");
echo form_open("menu/edittraining/". $newData->id, $attributes);
?>


<?php echo $this->session->flashdata('msg'); ?>
<?php echo $this->session->flashdata('verify_msg'); ?>

    <div id="new-training" class="card">
        <div class="card-header">
            <h2>Training bewerken
                <small>Hier kunt u de geselecteerde training bewerken.</small>
            </h2>
        </div>

        <div class="card-body card-padding">

            <div class="input-group">
                <input class="form-control" type="hidden" name="id" value="<?php echo $newData->id; ?>"/>
            </div>

            <div class="input-group">
                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                    <input type="text" name="name" class="form-control" value="<?php echo $newData->name; ?>">
                </div>

            </div>

            <div class="input-group">

                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <div class="dtp-container">
                        <input type="text" name="date" class="form-control date-time-picker" value="<?php echo $newData->date; ?>">
                    </div>
                </div>

            </div>

            <div class="input-group">
                <div class="fg-line">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                    <input type="text" name="description" class="form-control" value="<?php echo $newData->description; ?>">
                </div>

            </div>

            <div class="form-group">
                <button id="submit-button" type="submit" class="btn btn-primary btn-sm waves-effect">Bewerken</button>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>