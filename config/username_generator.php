<?php

return [
    /*
     * Model to check if the username is unique to.
     *
     * This is only used if unique is true
     */
    'model' => \App\Models\User::class,

    /*
     * Database field to check and store username
     */
    'column' => 'user_name',
];
