<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Furnishing;
use Faker\Generator as Faker;

$factory->define(Furnishing::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});
