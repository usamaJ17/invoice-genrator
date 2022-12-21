<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tax-Value
    |--------------------------------------------------------------------------
    |
    */
    'tax_rate' => 0.05,

    /*
    |--------------------------------------------------------------------------
    | Request-Form-Status
    |--------------------------------------------------------------------------
    |
    */
    'request_form_status' => [
        0 => 'Pending',
        1 => 'Approve',
        2 => 'Reject',
        3 => 'Hold',
    ],
    /*
    |--------------------------------------------------------------------------
    | Expirey-Document-Types
    |--------------------------------------------------------------------------
    |
    */
    'expirey_document_types' => [
        'Vehicle Expiry' => 'Vehicle Expiry',
        'Life Insurance Expiry' => 'Life Insurance Expiry',
        'Health Insurance' => 'Health Insurance',
        'Licenses Expiry' => 'Licenses Expiry',
        'Undertaking Letter' => 'Undertaking Letter',
        'Other' => 'Other'
    ],
    /*
    |--------------------------------------------------------------------------
    | Document-Types
    |--------------------------------------------------------------------------
    |
    */
    'document_types' => [
        'passport' => 'Passport',
        'visa' => 'Visa',
        'contract' => 'Contract',
        'emirates_id' => 'Emirates ID',
        'insurance' => 'Insurance',
        'driving_license'=>'Driving License',
        'jalaa_house_lease'=>'Eng. Jalaa House Lease Agreement',
    ],
    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    */
    'currency' => [
        'AED' => 'AED',
        'USD' => 'USD',
        'INR' => 'INR',
    ],
     /*
    |--------------------------------------------------------------------------
    | Invoice-types
    |--------------------------------------------------------------------------
    |
    */
    'invoice_type' => [
        'Rental' => 'Rental',
        'Sales' => 'Sales',
        'Service' => 'Service',
    ],
         /*
    |--------------------------------------------------------------------------
    | payment-types
    |--------------------------------------------------------------------------
    |
    */
    'payment_type' => [
        'Cash' => 'Cash',
        'Credit' => 'Credit',
        'Debit Card' => 'Debit Card',
        'Cheque' => 'Cheque',
        'Online' => 'Online',
    ],
    'unit' => [
        ''=>'',
        'PES' => 'PES',
        'MTR' => 'MTR',
        'BOX' => 'BOX',
        'LTR' => 'LTR',
        'ROLL' => 'ROLL',
        'SET' => 'SET',
    ],
    'rental_unit' => [
        ''=>'',
        'Hourly' => 'Hourly',
        'Daily' => 'Daily',
        'Weekly' => 'Weekly',
        'Monthly ' => 'Monthly ',
    ],
];
