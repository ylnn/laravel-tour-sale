<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'status' => 1,
        'name' => $faker->sentence,
        'slug' => str_slug($faker->sentence),
        'description' => $faker->paragraph
    ];
});
