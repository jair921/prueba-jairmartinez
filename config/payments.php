<?php

return [

    'methods' => ['placetopay'],

    'placetopay' => [
        'url'=> env('PLACETOPAY_URL', ''),
        'login'=> env('PLACETOPAY_LOGIN', ''),
        'trankey'=> env('PLACETOPAY_TRANKEY', ''),
    ],
];
