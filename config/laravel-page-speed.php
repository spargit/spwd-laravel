<?php

return [
    'enable' => env('LARAVEL_PAGE_SPEED_ENABLE', true),
    'skip' => [
        '*.pdf', //Ignore all routes with final .pdf
        '*/downloads/*',//Ignore all routes that contain 'downloads'
        'assets/*', // Ignore all routes with the 'assets' prefix
    ],
];