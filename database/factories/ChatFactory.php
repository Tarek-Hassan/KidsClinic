<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chat;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        //
      
        'from'=>$faker->numberBetween(1,2),
        'to'=>$faker->numberBetween(2,1),
        'body'=>$faker->text(),
        'created_at'=>Carbon::now(),

        
    ];
});
