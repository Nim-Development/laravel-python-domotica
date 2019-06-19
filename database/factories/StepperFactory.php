<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Stepper;
use Faker\Generator as Faker;

$factory->define(Stepper::class, function (Faker $faker) {
    return [
        'status' => 0,
    ];
});
