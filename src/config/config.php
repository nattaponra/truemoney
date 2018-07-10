<?php


return [
    'default_service' => env("TRUE_MONEY_SERVICE","tmpay"),
    'services' => [
        'tmpay' => [
            'merchant_id' => env("TMPAY_MERCHANT_ID",null),
            'resp_url'    => env("TMPAY_RESP_URL",'http://localhost/callback.php'),
        ]
    ]
];