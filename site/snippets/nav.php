<?php if(!$site->nav1()->isEmpty()): ?>
    <nav id="menu" class="menu">
        <ul>
            <?php foreach ($site->nav1()->toPages(',') as $item): ?>
                <li><a class="<?= $item->isOpen() ? 'active' : false ?> <?= $item->slug() == "contact" ? "contact" : false ?>" href="<?= $item->url(); ?>"><?= $item->title()->txt() ?></a></li>
            <?php endforeach ?>
        </ul>
    </nav>
<?php endif ?>