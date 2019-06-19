<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Action;
use Faker\Generator as Faker;

$factory->define(Action::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,3),
        'type' => $faker->numberBetween(1,5)
    ];
});
