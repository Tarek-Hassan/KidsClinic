<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->word,
        'color'=>$faker->hexcolor,
        'allDay'=>$faker->numberBetween(0,1),
        'start'=>Carbon::now()->add(($faker->numberBetween(0,3)),'day'),
        'end'=>Carbon::now()->add(($faker->numberBetween(4,7)),'day'),
        
    ];
});
