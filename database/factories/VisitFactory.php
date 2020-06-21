<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visit;
use Faker\Generator as Faker;

$factory->define(Visit::class, function (Faker $faker) {
    return [
        //
        'temp'=> rand(0, 100) / 10,
        'weight'=> rand(0, 100) / 10,
        'length'=> rand(0, 100) / 10,
        'head_circ'=> rand(0, 100) / 10,
        'notes'=>$faker->word,
        'patient_id'=>$faker->numberBetween(1,11),
        'doctor_id'=>$faker->numberBetween(1,6),
    ];
});
