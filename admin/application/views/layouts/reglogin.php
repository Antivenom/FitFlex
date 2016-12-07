<html>
	<head>
		<title>FitFlex</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
	
		<div id="content-wrapper" class="container-fluid">
			<a class="btn btn-default" id="homeBtn">Terug naar het menu</a>

			<div id="facebook-login">
				<!-- facebook button here -->
			</div>
			<div id="google-login">
				<!-- google button here -->
			</div>
			<div class="container">
				<?php $this->load->view($view,$data); ?>
				<div class="clearfix"></div>
			</div>

		</div>

		<footer>
		</footer>
	</body>
</html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/admin.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/admin2.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/style.css">

<script src="<?php echo BASE_HREF; ?>public/js/waves.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/moment.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/functions.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/functions2.js"></script>
