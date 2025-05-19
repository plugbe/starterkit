<?php

// Kirby::plugin('plug/kirbytags-escape', [
//     'hooks' => [
//         'kirbytags:before' => function ($text, array $data = [], array $options = []) {

//             // KirbyTags have not been parsed

//             return str_replace('\(','[[',str_replace('\)',']]',$text));
//         },

//         'kirbytags:after' => function ($text, array $data = [], array $options = []) {

//             // KirbyTags have already been parsed

//             return str_replace(']]',')',str_replace('[[','(',$text));
//         }
//     ]
// ]);


use Kirby\Cms\App;

Kirby::plugin('plug/kirbytags-escape', [
    'hooks' => [
        'kirbytags:before' => function (?string $text, array $data = [], array $options = []) {
            if (!is_string($text)) {
                return $text;
            }

            // KirbyTags have not been parsed
            $text = str_replace('\(', '[[' , str_replace('\)', ']]', $text));
            return $text;
        },

        'kirbytags:after' => function (?string $text, array $data = [], array $options = []) {
            if (!is_string($text)) {
                return $text;
            }

            // KirbyTags have already been parsed
            $text = str_replace('[[', '(', str_replace(']]', ')', $text));
            return $text;
        }
    ]
]);
