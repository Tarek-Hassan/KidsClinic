<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->title,
        'color'=>$faker->hexcolor,
        'allDay'=>$faker->numberBetween(0,2),
        'start'=>$faker->dateTime,
        'end'=>$faker->dateTime,
        
    ];
});
