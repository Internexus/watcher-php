<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | You can find your API key on your project settings page.
    |
    */

    'key' => env('LARACATCH_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Remote URL
    |--------------------------------------------------------------------------
    |
    | Remote endpoint to send data.
    |
    */
    'url' => env('LARACATCH_URL', 'http://server/api/'),

    /*
    |--------------------------------------------------------------------------
    | Query
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to automatically add all queries executed in the timeline.
    |
    */

    'query' => env('LARACATCH_QUERY', true),

    /*
    |--------------------------------------------------------------------------
    | Bindings
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to include the query bindings.
    |
    */

    'bindings' => env('LARACATCH_QUERY_BINDINGS', false),

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to set the current user logged in via
    | Laravel's authentication system.
    |
    */

    'user' => env('LARACATCH_USER', true),

    /*
    |--------------------------------------------------------------------------
    | Email
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to monitor email sending.
    |
    */

    'email' => env('LARACATCH_EMAIL', true),

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to monitor notifications.
    |
    */

    'notifications' => env('LARACATCH_NOTIFICATIONS', true),

    /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to monitor background job processing.
    |
    */

    'views' => env('LARACATCH_VIEWS', true),

    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to monitor background job processing.
    |
    */

    'job' => env('LARACATCH_JOB', true),

    /*
    |--------------------------------------------------------------------------
    | Job
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to monitor background job processing.
    |
    */

    'redis' => env('LARACATCH_REDIS', true),

    /*
    |--------------------------------------------------------------------------
    | Exceptions
    |--------------------------------------------------------------------------
    |
    | Enable this if you'd like us to report unhandled exceptions.
    |
    */

    'unhandled_exceptions' => env('LARACATCH_UNHANDLED_EXCEPTIONS', true),

    /*
    |--------------------------------------------------------------------------
    | Hide sensible data from http requests
    |--------------------------------------------------------------------------
    |
    | List request fields that you want mask from the http payload.
    | You can specify nested fields using the dot notation: "user.password"
    */

    'hidden_parameters' => [
        'password',
        'password_confirmation'
    ],

    /*
    |--------------------------------------------------------------------------
    | Artisan command to ignore
    |--------------------------------------------------------------------------
    |
    | Add at this list all command signature that you don't want monitoring
    | in your LARACATCH dashboard.
    |
    */

    'ignore_commands' => [
        'schedule:run',
        'schedule:finish',
        'package:discover',
        'vendor:publish',
        'package:discover',
        'migrate:rollback',
        'migrate:refresh',
        'migrate:fresh',
        'migrate:reset',
        'migrate:install',
        'config:cache',
        'config:clear',
        'route:cache',
        'route:clear',
        'view:cache',
        'view:clear',
        'queue:listen',
        'queue:work',
        'queue:restart',
        'horizon',
        'horizon:work',
        'horizon:supervisor',
        'horizon:terminate',
        'horizon:snapshot',
        'nova:publish',
    ],

    /*
    |--------------------------------------------------------------------------
    | Web request url to ignore
    |--------------------------------------------------------------------------
    |
    | Add at this list the url schemes that you don't want monitoring
    | in your LARACATCH dashboard. You can also use wildcard expression (*).
    |
    */

    'ignore_url' => [
        'telescope*',
        'vendor/telescope*',
        'horizon*',
        'vendor/horizon*',
        'nova*'
    ],

    /*
    |--------------------------------------------------------------------------
    | Job classes to ignore
    |--------------------------------------------------------------------------
    |
    | Add at this list the job classes that you don't want monitoring
    | in your LARACATCH dashboard.
    |
    */

    'ignore_jobs' => [
        //\App\Jobs\MyJob::class
    ],
];
