<?php if($data->direct1() !== null && $data->direct1()->toBool()): ?>
    <a href="<?= $data->a() ?>" target="_blank" class="accordion">
        <div class="accordion-summary">
            <span><?= $data->q() ?></span>
            <i><?= snippet('svg/external') ?></i>
        </div>
    </a>
<?php else: ?>
    <details class="accordion">
        <summary class="accordion-summary">
            <span role="term" aria-details="<?= $data->id() ?>"><?= $data->q() ?></span>

            <i><?= snippet('svg/plus') ?></i>
        </summary>
    </details>

    <div role="definition" id="<?= $data->id() ?>" class="accordion-body">
        <?= $data->a()->kt() ?>

        <?php if (!$data->button1()->isEmpty()): ?>
        <?php if ($btn = $data->button1()->toObject()): ?>
            <?php snippet('components/button', ['class'   => 'btn btn-simple reversed', 'btn' => $btn->label1(), 'url' => $btn->action1()->toUrl(), 'anchor' => $btn->formanchor1() ?? false, 'target' => $btn->tab1()->toBool()]); ?>
        <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>