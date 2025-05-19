<?php snippet('header') ?>
<section id="plg-textpage">
    <div class="plg-container">
        <h1><?= $page->title() ?></h1>
        <?= $page->text()->kt(); ?>
    </div>
</section>
<?php snippet('footer') ?>
