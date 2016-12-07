<?php echo form_open("menu/newtraining", array("name" => "training", "class" => "jsform")); ?>

<div id="error-field" class="alert alert-danger text-center hide"></div>

<div id="new-training" class="card">
    <div class="card-header">
        <h2>Training aanmaken
            <small>Hier kunt u een training aanmaken om hem vervolgens in de tabel in het overzicht te weergeven.</small>
        </h2>
    </div>

    <div class="card-body card-padding">

        <div class="input-group">

            <div class="fg-line">
                <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Naam">
            </div>

        </div>

        <div class="input-group">

            <div class="fg-line">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <div class="dtp-container">
                    <input type="text" name="date" class="form-control date-time-picker" placeholder="Datum">
                </div>
            </div>

        </div>

        <div class="input-group">

            <div class="fg-line">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" name="description" class="form-control" placeholder="Beschrijving">
            </div>

        </div>

        <div class="form-group">
            <button id="submit-button" type="submit" class="btn btn-primary btn-sm waves-effect">Aanmaken</button>
        </div>
    </div>
</div>

<?php echo form_close(); ?>