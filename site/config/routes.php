<?php

return [
    [
        'pattern'   => 'contact',
        'method'    => 'POST',
        'action'    => $contactForm
    ],
    [
        'pattern' => 'status',
        'method'  => 'GET',
        'action'  => function () {

            $secret = get('secret');
            $allowed = 'SECRET';

            if ($secret !== $allowed) {
                return [
                    'status'  => 'error',
                    'message' => 'Forbidden'
                ];
            }

            // Add proper CORS headers
            kirby()->response()->header('Access-Control-Allow-Origin', 'https://hub.plugdev.be');
            kirby()->response()->header('Access-Control-Allow-Methods', 'GET');
            kirby()->response()->header('Content-Type', 'application/json');

            return [
                'php'         => phpversion(),
                'kirby'       => kirby()->version(),
                'debug'       => option('debug'),
                'url'         => url()
            ];
        }
    ],
];