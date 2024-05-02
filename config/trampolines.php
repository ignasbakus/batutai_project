<?php
return [

    /*Custom params, variables of Trampoline rent business*/
    'currency' => env('TRAMPOLINES_TRANSACTIONS_CURRENCY', 'eur'),

    //@todo KAZKA RIEKIA PASIKOMENTUOTI
    'rental_duration' => env('TRAMPOLINES_RENTAL_DURATION', 1),

    //@todo KAZKA RIEKIA PASIKOMENTUOTI
    'rental_duration_type' => env('TRAMPOLINES_RENTAL_DURATION_TYPE', 'd')
];
