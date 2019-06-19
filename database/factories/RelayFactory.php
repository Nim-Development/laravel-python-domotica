<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Relay;
use Faker\Generator as Faker;

$factory->define(Relay::class, function (Faker $faker) {
    return [
        'status' => 0,
    ];
});
