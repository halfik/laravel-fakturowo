<?php

return [
    'api' => [
        'key' => env('FAKTUROWO_KEY'),
        'url' => env('FAKTUROWO_URL', 'https://www.fakturowo.pl/api'),
        'encoding' => env('FAKTUROWO_DOC_ENCODING', 1) //1 - UTF-8,
    ],
];
