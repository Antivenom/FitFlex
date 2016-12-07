<!DOCTYPE HTML>
<html>
	<head>
		<?Loader::element('header_required'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?=$view->getThemePath()?>assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?=$view->getThemePath()?>/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?=$view->getThemePath()?>assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="<?=$view->getThemePath()?>/css/style.css" />

		<?php if($c->isEditMode()) { ?>
			<link rel="stylesheet" href="<?=$view->getThemePath()?>/css/editmode.css" />
		<?php } ?>
	</head>
	<body class="landing">
	<div class="<?=$c->getPageWrapperClass()?> ">
		<div id="page-wrapper">
			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="<?=View::url('/');?>"><img style="height:90%;" src="<?=$view->getThemePath()?>/images/fitflexlogo.jpg"></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="<?=View::url('/fitflex-formule');?>">Formule</a></li>
							<li><a href="<?=View::url('/lessen');?>">Lessen</a></li>
							<li><a href="<?=View::url('/trainers');?>">Trainers</a></li>
							<li><a href="<?=View::url('/over-ons');?>">Over ons</a></li>
							<li><a href="<?=View::url('/contact');?>">Contact</a></li>
							<li><a href="<?=View::url('/admin/user/login');?>">Log In</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">

					<div id="bannertext">
						<? 
							$a = new Area('Banner'); 
							$a->display($c);
						?>
						<ul class="actions">
							<li><a href="<?=View::url('/fitflex-formule');?>" class="button">Bekijk de FitFlex Formule!</a></li>
						</ul>
					</div>

				</section>

			<!-- CTA
				<section id="cta">
					<?
					//	$a = new Area('cta');
					//	$a->display($c);
					?>

					<form>
						<div class="row uniform 50%">
							<div class="8u 12u(mobilep)">
								<input type="email" name="email" id="email" placeholder="Email Adres" />
							</div>
							<div class="4u 12u(mobilep)">
								<input type="submit" value="Aanmelden" class="fit" />
							</div>
						</div>
					</form> 

				</section>
			-->

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
			<script src="<?=$view->getThemePath()?>/assets/js/jquery.min.js"></script>
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