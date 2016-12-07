<html>
	<head>
		<title>FitFlex</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#60B3D3">
		<script src="<?php echo BASE_HREF; ?>public/js/jquery-3.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/datetimepicker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/admin.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/admin2.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_HREF; ?>public/css/admin/sweetalert.css">
		

	</head>
	<body>
		<?php
		// Check if you're supposed to be here
		if(isset($this->session->userdata['logged_in']))
		{
			if(isset($this->layout->data['userstats']))
			{
				$userstats = $this->layout->data['userstats'][0];
			}

			if($userstats['auth'] == 'admin')
			{
				$this->load->view('/layouts/nav/adminbar.php');
			}
			else if($userstats['auth'] == 'mod')
			{
				$this->load->view('/layouts/nav/modbar.php');
			}
			else // redirect basic users to homepage
			{
				redirect('/');
			}
		}
		else
		{
			redirect('/user/login');
		}
		?>

		<div id="content-wrapper" class="container-fluid">
			<div id="sidebar-nav" class="col-md-3">

				<a href="<?= BASE_HREF ?>" id="homeBtn2" class="btn btn-primary btn-sm hec-button">Terug naar de Hoofdpagina</a>

				<a href="#" id="homeBtn" class="btn btn-primary btn-sm hec-button">Terug naar het Beheer</a>

				<?php

				if(isset($userstats))
				{
					?>
					<div id="statistics">

						<div class="mini-charts">
							<div class="mini-charts-item bgm-blue">
								<div class="clearfix">

									<div class="chart stats-bar">
										<span class="glyphicon glyphicon-fire" aria-hidden="true" style="display: inline-block; padding-left:22px; color:white; font-size:40px;"></span>
									</div>

									<div class="count" style="text-align:center;">

										<small>Aantal trainingen bezocht</small>
										<h2><?php echo $userstats['training_amount']; ?></h2>
									</div>
								</div>
							</div>


							<div class="mini-charts-item bgm-lightgreen">
								<div class="clearfix">
									<div class="chart stats-bar">
										<span class="glyphicon glyphicon-calendar" aria-hidden="true" style="display: inline-block; padding-left:22px; color:white; font-size:40px;"></span>
									</div>
									<div class="count" style="text-align:center;">
										<small>Bijeenkomsten bezocht</small>
										<h2><?php echo $userstats['meeting_amount']; ?></h2>
									</div>
								</div>
							</div>


							<div class="mini-charts-item bgm-gray">
								<div class="clearfix">
									<div class="chart stats-bar">
										<span class="glyphicon glyphicon-check" aria-hidden="true" style="display: inline-block; padding-left:22px; color:white; font-size:40px;"></span>
									</div>
									<div class="count" style="text-align:center;">
										<small>Percentage aanwezigheid</small>
										<h2>99,87%</h2>
									</div>
								</div>
							</div>
						</div>

					</div>
				<?php } ?>
			</div>
			<div id="menucontainer" class="container col-md-9">
				<div id="error-field"></div>
				<?php $this->load->view($view,$data); ?>
				<div class="clearfix"></div>
			</div>


		</div>

		<footer>
		</footer>
	</body>
</html>

<script src="<?php echo BASE_HREF; ?>public/js/waves.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/moment.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/functions.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/sweetalert.min.js"></script>
<script src="<?php echo BASE_HREF; ?>public/js/menu.js"></script>

