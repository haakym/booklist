<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'author' => $faker->name
    ];
});
