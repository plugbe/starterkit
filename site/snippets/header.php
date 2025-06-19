<!doctype html>
<html lang="<?= $site->lang(); ?>">
<head>
	<meta charset="utf-8">
	<?= snippet('seo/head'); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="format-detection" content="telephone=no">

	<?= snippet('plugins/styles'); ?>
	<?= css('assets/css/style.css?v=' . $site->timestamp()->text()); ?>

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
		<?= snippet('components/header/header') ?>

		<div class="web-container">
			<div class="<?= $page->template(); ?>__container" id="content">

