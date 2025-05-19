<form id="contact-form" action="<?= $page->url() ?>" method="POST">
    <div class="form-grid">
        <div class="form-group group-email">
            <input name="email" type="email" placeholder="<?= t('e-mailadres') ?>"value="">
            <p class="error-text error-email"></p>
        </div>

        <div class="form-group group-email">
            <input name="email" type="email" placeholder="<?= t('e-mailadres') ?>"value="">
            <p class="error-text error-email"></p>
        </div>

        <div class="form-group group-email">
            <input name="email" type="email" placeholder="<?= t('e-mailadres') ?>"value="">
            <p class="error-text error-email"></p>
        </div>

        <div class="form-group group-email">
            <input name="email" type="email" placeholder="<?= t('e-mailadres') ?>"value="">
            <p class="error-text error-email"></p>
        </div>

        <div class="form-group group-message w-full">
            <textarea name="message" placeholder="<?= t('boodschap') ?>"></textarea>
            <p class="error-text error-message"></p>
        </div>
    </div>

    <?php echo csrf_field(); ?>
    <?php echo honeypot_field(); ?>

    <div class="form-group noline policy group-policy" id="group-policy">
        <input type="checkbox" id="policy" name="policy">
        <label class="checkbox" for="policy"><?= t('ik-aanvaard-de') ?> <a href="<?= u('privacy-policy') ?>" target="_blank"><?= page('privacy-policy')->title()->txt(); ?></a></label>
        <p class="error-text error-policy"></p>
    </div>

    <button type="submit" class="btn border-red font-medium text-base text-red"><?= t('versturen') ?></button>
</form>
<p id="feedback"></p>