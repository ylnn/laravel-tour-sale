<?php

use Faker\Generator as Faker;
use App\Date;
use Carbon\Carbon;

$factory->define(Date::class, function (Faker $faker) {
    $randomDay = rand(3, 10);
    $secondRandomDay = rand(8, 15);
    $prices = [550, 700, 800, 1500, 2000, 3500];
    $currencies = ['TRY','USD','EUR'];
    return [
        'status' => 1,
        'user_id' => \App\User::first()->id,
        'start_date' => Carbon::now()->addDays($randomDay), 
        'end_date' => Carbon::now()->addDays($randomDay + $secondRandomDay),
        'min_pax' => 10,
        'max_pax' => 20,
        'price' => $prices[array_rand($prices)],
        'currency' => $currencies[array_rand($currencies)],
    ];
});
