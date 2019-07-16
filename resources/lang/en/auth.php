<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'The email or password is wrong',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'required' => [
        'email' => 'Email Empty',
        'password' => 'Password Empty',
        'yourname' => 'Your name Empty',
        'phone' => 'Phone Empty',
        'address' => 'Address Empty',
        'password_confirm' => 'Password Confirm Empty',
        'gender' => 'Gender Not Choose',
        'role' => 'Role Not Choose',
    ],
    'min' => [
        'yourname' => 'Your Name Too Short',
        'phone' => 'Phone Too Short',
        'address' => 'Address Too Short',
        'password' => 'Password Too Short',
    ],
    'max' => [
        'password' => 'Password Too Long',
        'yourname' => 'Your Name Too Long',
        'phone' => 'Phone Too Long',
        'address' => 'Address Too Long',
    ],
    'equalTo' => [
        'password' => 'Password Incorrect',
    ],
    'email' => [
        'email' => 'Email wrong',
    ],
];
