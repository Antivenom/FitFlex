<!DOCTYPE html>
<html>
<head>
	<?Loader::element('header_required'); ?>
	<link rel="stylesheet" type="text/css" href="<?=$view->getThemePath()?>/css/style.css">
</head>
<body>
	<div class="<?=$c->getPageWrapperClass()?>">

	<header>
		<div>
			<?
			$a = new Area('Header');
			$a->enableGridContainer();
			$a->display($c);
			?>
		</div>
	</header>

	</div>
	<?Loader::element('footer_required'); ?>
</body>
</html>
