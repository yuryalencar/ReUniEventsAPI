<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'image' => $faker->image(),
        'name' => $faker->name,
        'category' => 'outros',
        'description' => $faker->paragraph,
        'place' => $faker->country,
        'date' => $faker->dateTime(),
        'price' => $faker->randomFloat(2, 0, 5000),
    ];
});
