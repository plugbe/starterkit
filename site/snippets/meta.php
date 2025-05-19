<?php if($page->isHomepage()):?>
    <meta itemprop="name" content="<?= $page->seotitle()->isNotEmpty() ? $page->seotitle() : site()->seotitle() ?>">
    <meta itemprop="description" content="<?= $page->seodescription()->isNotEmpty() ? $page->seodescription() : site()->seodescription()->txt() ?>">
    <meta name="twitter:title" content="<?= $page->seotitle()->isNotEmpty() ? $page->seotitle() : site()->seotitle() ?>">
    <meta name="twitter:description" content="<?= $page->seodescription()->isNotEmpty() ? $page->seodescription() : site()->seodescription()->txt() ?>">
<?php else: ?>
    <meta itemprop="name" content="<?= $page->seotitle()->isNotEmpty() ? $page->seotitle() : $page->title() . ' | ' . site()->seotitle() ?>">
    <meta itemprop="description" content="<?= $page->seodescription()->isNotEmpty() ? $page->seodescription() : site()->seodescription()->txt() ?>">
    <meta name="twitter:title" content="<?= $page->seotitle()->isNotEmpty() ? $page->seotitle() : $page->title() . ' | ' . site()->seotitle() ?>">
    <meta name="twitter:description" content="<?= $page->seodescription()->isNotEmpty() ? $page->seodescription() : site()->seodescription()->txt() ?>">
<?php endif ?>
<?php if($page->seoimg()->isNotEmpty()): ?>
    <meta name="twitter:image" content="<?= $page->seoimg()->toFile()->url(); ?>">
<?php else: ?>
    <meta name="twitter:image" content="<?= $site->seoimg()->toFile()->url(); ?>">
<?php endif ?>
<?php if($page->seoimg()->isNotEmpty()): ?>
    <meta property="og:image" content="<?= $page->seoimg()->toFile()->url(); ?>">
<?php else: ?>
    <meta property="og:image" content="<?= $site->seoimg()->toFile()->url(); ?>">
<?php endif ?>
<?php if (strpos($site->url(), "plugdev") !== false): ?>
    <meta name="robots" content="noindex,nofollow">
<?php endif ?>