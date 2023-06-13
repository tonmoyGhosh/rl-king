<?php

return [

    'sms' => [
        'special_chars' => ['~', '^', '{', '}', '[', ']', '\\', '|'],
        'settings' => [
            'transmitOnlyBengaliSms' => env('TRANSMIT_ONLY_BENGALI_SMS',true),
            'sms_length' => [
                'text' => 900,
                'unicode' => 315,
                'text_limit_for_unlimited_character_sms' => 750,
            ],
            'single_sms' => [
                'text' => 160,
                'text_with_special_chars' => 160,
                'unicode' => 70
            ],
            'multiple_sms' => [
                'text' => 150,
                'text_with_special_chars' => 150,
                'unicode' => 65
            ],
        ],
        'max_attempt_limit' => [
            'single_sms' => 3, // When the Mask SMS max attempt limit exceeds, then send the sms with Nonmask
            'campaign' => 3, // When the Mask SMS max attempt limit exceeds, then send the sms with Nonmask
        ],
        'api' => [
            'request_limit' => [
                'campaign' => 1000,
                'quick_campaign' => 50,
            ],
        ],
    ]
    
];