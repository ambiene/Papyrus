<?php

return [
    'api_key' => env('PAPYRUS_API_KEY'),
    'base_uri' => env('PAPYRUS_API_URL', 'https://www.googleapis.com/books/v1/'),
    'batchSize' => env('PAPYRUS_BATCH_SIZE', 10),
    'language' => env('PAPYRUS_LANGUAGE', 'en'),
];
