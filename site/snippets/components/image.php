<source
    srcset="<?= $img->srcset('webp') ?>"
    type="<?= $img->thumb(['format' => 'webp'])->mime(); ?>">


<source
    srcset="<?= $img->srcset() ?>"
    type="<?= $img->thumb()->mime(); ?>">


<img
    alt="<?= (!$img->alt() ? $img->alt() : 'Website') ?>"
    class="<?= (isset($class) ? $class : '') ?>"
    srcset="<?= $img->srcset() ?>"
    src="<?= $img->url(); ?>"
    decoding="async"
    loading="lazy" />