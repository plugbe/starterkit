<a
    <?= $btn->tab1()->toBool() ? 'target="_blank"' : false ?>
    href="<?= $btn->btnlink()->toUrl() ?><?= $btn->btnanchor()->txt() ?>"
    class="btn">
    <?= $btn->btnlabel() ?>
</a>