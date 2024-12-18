<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API endpoint URL
    |--------------------------------------------------------------------------
    |
    | This value is the URL of the API endpoint.
    |
    | Example: https://api.example.com/logs/create/
    |
    */

    'endpoint' => env('LOG_API_ENDPOINT'),

    /*
    |--------------------------------------------------------------------------
    | API token
    |--------------------------------------------------------------------------
    |
    | This is the API token that is sent via the token_header_name HTTP header.
    |
    */

    'token' => env('LOG_API_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | API token header name
    |--------------------------------------------------------------------------
    |
    | This is the API token header name that is used for the HTTP header.
    |
    */

    'token_header_name' => env('LOG_API_TOKEN_HEADER_NAME', 'X-Api-Token'),

    /*
    |--------------------------------------------------------------------------
    | User Agent
    |--------------------------------------------------------------------------
    |
    | This is the user agent string, that is used for the HTTP request.
    |
    */

    'user_agent' => env('LOG_API_USER_AGENT'),

    /*
    |--------------------------------------------------------------------------
    | Post field names
    |--------------------------------------------------------------------------
    |
    | This is the array of post field names.
    |
    */
    'post_field_names' => [
        'level' => env('LOG_API_POST_FIELD_NAME_LEVEL', 'level'),
        'message' => env('LOG_API_POST_FIELD_NAME_MESSAGE', 'message'),
        'stacktrace' => env('LOG_API_POST_FIELD_NAME_STACKTRACE', 'stacktrace'),
    ],
];
