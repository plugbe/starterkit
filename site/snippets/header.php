<!doctype html>
<html lang="<?= $site->lang(); ?>">
<head>
	<meta charset="utf-8">
	<?= snippet('seo/head'); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="format-detection" content="telephone=no">


	<?= css('assets/css/style.css?v=' . $site->timestamp()->text()); ?>
	<?= css('assets/css/jquery.fancybox.min.css'); ?>
	<?= css('assets/css/swiper-bundle.min.css'); ?>

	<!-- FAVICON'S ============================================================= -->
	<link rel="icon" type="image/png" href="<?php echo url('assets/images/favicons/favicon.png') ?>" />
	<link rel="apple-touch-icon" href="<?php echo url('assets/images/favicons/apple-touch-icon.png') ?>" />
	<meta name="msapplication-TileColor" content="#000000" />
	<meta name="format-detection" content="telephone=no">
	<?php if (strpos($site->url(), "plugdev") !== false): ?>
		<meta name="robots" content="noindex,nofollow">
	<?php endif ?>
</head>

<body data-barba="wrapper" class="<?= $page->template(); ?>">
	<?= snippet('components/popup'); ?>

	<main data-barba="container" data-barba-namespace="<?= $page->template(); ?>">
		<header class="header">
			<div class="header-inner">
				<div class="header-logo">
					<div class="header-logo-inner">
						<a href="<?= $site->url() ?>">
							<img src="<?= u('assets/images/logo.png') ?>" alt="<?= $site->title() ?>">
						</a>
					</div>
				</div>

				<div class="header-navigation">
					<div class="header-navigation-inner">
						<?= snippet('nav'); ?>
					</div>
				</div>
			</div>
		</header>

		<div class="spacer"></div>

		<div class="web-container">
			<?php if($page->intendedTemplate() == "accessoire" || $page->intendedTemplate() == "realisatie-cat" || $page->intendedTemplate() == "realisatie"): ?>
				<?= snippet('components/breadcrumbs'); ?>
			<?php endif; ?>
			<div class="<?= $page->template(); ?>__container" id="content">

