<source 
    alt="<?= (!$img->alt() ? $img->alt() : 'Website') ?>"
    class="<?= (isset($class) ? $class : '') ?>"
    srcset="<?= $img->srcset('webp') ?>"
    type="<?= $img->thumb(['format' => 'webp'])->mime(); ?>"
    loading="lazy"
>


<source 
    alt="<?= (!$img->alt() ? $img->alt() : 'Website') ?>"
    class="<?= (isset($class) ? $class : '') ?>"
    srcset="<?= $img->srcset() ?>"
    type="<?= $img->thumb()->mime(); ?>"
    loading="lazy"
>


<img 
    alt="<?= (!$img->alt() ? $img->alt() : 'Website') ?>"
    class="<?= (isset($class) ? $class : '') ?>"
    srcset="<?= $img->srcset() ?>"
    src="<?= $img->url(); ?>"
    decoding="async"
    loading="lazy"
/>
