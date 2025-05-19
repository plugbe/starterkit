<?php snippet('header') ?>

<?php $i = 0; foreach($page->children()->listed() as $block): ?>
    <?php snippet('blocks/' . $block->intendedTemplate(), ['data' => $block]); ?>
<?php endforeach; ?>

<?php snippet('footer') ?>