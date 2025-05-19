<?php
// Kirby::plugin('kirby/columns', [
//   'hooks' => [
//     'kirbytags:before' => function ($text, array $data = []) {

//       $text = preg_replace_callback('!\(columns(…|\.{3})\)(.*?)\((…|\.{3})columns\)!is', function($matches) use($text, $data) {

//         $columns        = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
//         $html           = [];
//         $classItem      = $this->option('kirby.columns.item', 'column');
//         $classContainer = $this->option('kirby.columns.container', 'columns');

//         foreach ($columns as $column) {
//             $html[] = '<div class="' . $classItem . '">' . $this->kirbytext($column, $data) . '</div>';
//         }

//         return '<div class="' . $classContainer . '">' . implode($html) . '</div>';

//       }, $text);

//       return $text;
//     }

//   ]
// ]);


use Kirby\Cms\App;

Kirby::plugin('plug/columns', [
    'hooks' => [
        'kirbytags:before' => function (?string $text, array $data = []) {
            if (!is_string($text)) {
                return $text;
            }

            $text = preg_replace_callback('!\(columns(…|\.{3})\)(.*?)\((…|\.{3})columns\)!is', function($matches) use($data) {

                $columns        = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
                $html           = [];
                $classItem      = option('plug.columns.item', 'column');
                $classContainer = option('plug.columns.container', 'columns');

                foreach ($columns as $column) {
                    $html[] = '<div class="' . $classItem . '">' . kirbytext($column, $data) . '</div>';
                }

                $subject = $matches[0];
                $search  = [$subject, '(' . str_repeat('.', rand(3, 5)) . 'columns)'];
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
