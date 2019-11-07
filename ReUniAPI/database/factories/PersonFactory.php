<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'expires_at' => $faker->dateTime,
        'facebook_token' => $faker->unique()->text(),
    ];
});
