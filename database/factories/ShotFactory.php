<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shot;
use Faker\Generator as Faker;

$factory->define(Shot::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});
