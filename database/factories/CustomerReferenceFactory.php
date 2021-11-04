<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CustomerReference;
use Faker\Generator as Faker;

$factory->define(CustomerReference::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});
