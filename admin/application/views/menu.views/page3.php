<?php echo form_open("menu/newarticle", array("name" => "article", "class" => "jsform")); ?>

<div id="error-field" class="alert alert-danger text-center hide"></div>

<div id="new-article" class="card">
	<div class="card-header">
		<h2>Artikel in de media aanmaken
			<small>Hier kunt u een artikel aanmaken om hem vervolgens in het overzicht te weergeven.</small>
		</h2>
	</div>

	<div class="card-body card-padding">
		<div class="input-group">

			<div class="fg-line">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="name" class="form-control" placeholder="Naam">
			</div>

		</div>

		<div class="input-group">

			<div class="fg-line">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					<textarea name="content" class="form-control" placeholder="Content"></textarea>
			</div>

		</div>
		<div class="form-group">
			<button id="submit-button" type="submit" class="btn btn-primary btn-sm waves-effect">Aanmaken</button>
		</div>
	</div>
</div>

<?php echo form_close(); ?>

<script>
    tinymce.init
    ({
        selector:'textarea',
        height: 250
    });
</script>

