<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'price' => $faker->randomNumber(4, true),
        'guests_number' => $faker->numberBetween(0, 200),
        'payed' => 0,
        'comments' => $faker->text(),
        'location' => $faker->address(),
        'datetime' => $faker->date('Y-m-d ').$faker->time(),
    ];
});
