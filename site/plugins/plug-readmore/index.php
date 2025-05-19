<?php

use Kirby\Cms\App;

Kirby::plugin('plug/readmore', [
    'hooks' => [
        'kirbytags:before' => function (?string $text, array $data = []) {
            if (!is_string($text)) {
                return $text;
            }

            $text = preg_replace_callback('!\(readmore(…|\.{3})\)(.*?)\((…|\.{3})readmore\)!is', function($matches) use($data) {

                $wrapper        = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
                $html           = [];
                $classItem      = option('plug.readmore.item', 'readmore');
                $classContainer = option('plug.readmore.container', 'readmore-wrapper');
                $readmoreBtn = '<summary>Lees meer</summary>';

                foreach ($wrapper as $readmore) {
                    $html[] = '<details class="' . $classItem . '">' . $readmoreBtn . kirbytext($readmore, $data) . '</details>';
                }

                $subject = $matches[0];
                $search  = [$subject, '(' . str_repeat('.', rand(3, 5)) . 'readmore)'];
                $replace = [$classContainer, '$1'];

                if ($subject !== null) {
                    $text = str_replace($search, $replace, $subject);
                }

                return implode($html);

            }, $text);

            return $text;
        }
    ]
]);
