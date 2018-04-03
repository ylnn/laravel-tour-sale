<?php

use Faker\Generator as Faker;
use App\Tour;

$factory->define(Tour::class, function (Faker $faker) {
    return [
        'status' => 1,
        'name' => $faker->sentence(3),
        'slug' => str_slug($faker->sentence()),
        'description' => $faker->paragraph(),
        'summary' => $faker->paragraph(),
        'category_id' => rand(1,3)
    ];
});
