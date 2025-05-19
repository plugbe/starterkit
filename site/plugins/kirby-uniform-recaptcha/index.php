<?php

@include_once __DIR__ . '/vendor/autoload.php';

load([
    'Uniform\\Guards\\RecaptchaGuard' => 'src/Guards/RecaptchaGuard.php'
], __DIR__);

@include_once __DIR__ . '/src/helpers.php';

Kirby::plugin('expl0it3r/uniform-recaptcha', [
	'options' => [
		'siteKey' => '6LfOWyYkAAAAADxGCny-blUng_1MS7FY7NgD6eRf',
		'secretKey' => '6LfOWyYkAAAAAL4F_SwYNFfYUVmC9HFUZuxcsIhl'
	],
	'translations' => [
        'de'    => @include_once __DIR__ . '/i18n/de.php',
		'en'    => @include_once __DIR__ . '/i18n/en.php',
		'nl'    => @include_once __DIR__ . '/i18n/nl.php'
	]
]);
