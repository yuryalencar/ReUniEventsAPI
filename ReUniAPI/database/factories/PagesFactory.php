<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'slug_of_the_page' => $faker->slug,
        'person_id' => $faker->numberBetween(1, 9)
    ];
});
