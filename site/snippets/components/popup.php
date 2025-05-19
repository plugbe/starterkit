<?php if(!isset($_GET['nopopup'])): ?>
    <?php if(page('popup')->display1() == "showpop"): ?>
        <div style="display: none;" id="hiddenmodal">
            <div class="modal__body"><?= page('popup')->text()->kt(); ?></div>
        </div>
    <?php endif; ?>
<?php endif; ?>