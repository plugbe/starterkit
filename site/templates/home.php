<?php snippet('header') ?>

<?php $i = 0;
foreach ($page->blocks1()->toBlocks() as $block): ?>
    <?php snippet('blocks/' . $block->type(), ['data' => $block]); ?>
<?php endforeach; ?>

<?php snippet('footer') ?>