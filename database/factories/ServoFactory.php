<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Servo;
use Faker\Generator as Faker;

$factory->define(Servo::class, function (Faker $faker) {
    return [
        'status' => 0,
    ];
});
