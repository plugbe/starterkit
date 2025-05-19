<?php


use Kirby\Cms\App;
use Kirby\Uuid\Uuid;


/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
require_once 'forms.php';


return [
    'languages' => true,
    'debug' => true,
    'yaml.handler' => 'symfony', // already makes use of the more modern Symfony YAML parser: https://getkirby.com/docs/reference/system/options/yaml (will become the default in a future Kirby version)
    'panel' => [
        'language' => 'nl',
        'menu'  => [
            'site' => [
				'current' => function (): bool
				{
					$path = App::instance()->request()->path()->toString();
					return Str::contains($path, 'site');
				},
			],
            'system',
            'users',
            '-',
            'languages',
            'panelforms',
            'popup' => [
                'icon'  => 'megaphone',
                'label' => 'Pop-up',
                'link'  => 'pages/popup',
                'current' => function (): bool
				{
					$path = App::instance()->request()->path()->toString();
					return Str::contains($path, 'pages/popup');
				},
            ],
        ]
    ],
        'markdown' => [
        'safe'  => false
    ],
    # enable cache
    'cache' => [
        'pages' => [
        'active' => false
        ]
    ],
    'tobimori.seo.canonicalBase' => 'https://www.becopanel.be',
    // 'tobimori.seo.lang' => 'nl-BE', // ENKEL ALS EEN TALIG WEBSITE IS
    'tobimori.seo.robots' => [
        'active' => true,
        'content' => [
            '*' => [
                'Allow' => ['/'],
                'Disallow' => ['/kirby', '/panel', '/content']
            ]
        ]
    ],
    'thumbs' => [
        'srcsets' => [
            'default' => [
                '800w' => ['width' => 800, 'quality' => 80],
                '1024w' => ['width' => 1024, 'quality' => 80],
                '1440w' => ['width' => 1440, 'quality' => 80],
                '2048w' => ['width' => 2048, 'quality' => 80]
            ],
            'webp' => [
                '800w' => ['width' => 800, 'quality' => 80, 'format' => 'webp'],
                '1024w' => ['width' => 1024, 'quality' => 80, 'format' => 'webp'],
                '1440w' => ['width' => 1440, 'quality' => 80, 'format' => 'webp'],
                '2048w' => ['width' => 2048, 'quality' => 80, 'format' => 'webp']
            ]
        ]
    ],
    'routes'    => [
        [
            'pattern'   => 'contact',
            'method'    => 'POST',
            'action'    => $contactForm
        ]
    ]
];
