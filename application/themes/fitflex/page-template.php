<!DOCTYPE HTML>
<html>
	<head>
		<?Loader::element('header_required'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?=$view->getThemePath()?>/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?=$view->getThemePath()?>/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?=$view->getThemePath()?>/assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="<?=$view->getThemePath()?>/css/style.css" />

        <script src="<?=$view->getThemePath()?>/assets/js/jquery.min.js"></script>

		<?php if($c->isEditMode()) { ?>
			<link rel="stylesheet" href="<?=$view->getThemePath()?>/css/editmode.css" />
		<?php } ?>
	</head>
	<body>
	<div class="<?=$c->getPageWrapperClass()?> ">
		<div id="page-wrapper">
			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="<?=View::url('/');?>"><img style="height:90%;" src="<?=$view->getThemePath()?>/images/fitflexlogo.jpg"></a></h1>
					<?
						$view->inc('navigation.php');
					?>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<? 
							$a = new Area('Banner'); 
							$a->display($c);
						?>
					</header>
					<div class="box">
						<span class="image featured">
							<?
								$a = new Area('FeaturedImage');
								$a->display($c);
							?>
						</span>
						<?
							$a = new Area('Content');
							$a->display($c);
						?>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; FitFlex. All rights reserved.</li><li>Design: <a href="http://diontrilsbeek.com">Max en Dion</a></li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="<?=$view->getThemePath()?>/assets/js/jquery.dropotron.min.js"></script>
			<script src="<?=$view->getThemePath()?>/assets/js/jquery.scrollgress.min.js"></script>
			<script src="<?=$view->getThemePath()?>/assets/js/skel.min.js"></script>
			<script src="<?=$view->getThemePath()?>/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="<?=$view->getThemePath()?>/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?=$view->getThemePath()?>/assets/js/main.js"></script>

	</div>
	<?Loader::element('footer_required'); ?>
	</body>
</html>