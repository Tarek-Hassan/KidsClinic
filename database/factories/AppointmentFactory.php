<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'phone'=>$faker->e164PhoneNumber,
        'checked'=>$faker->numberBetween(0,1),
        'notes'=>$faker->text(),
        'dept'=>$faker->numberBetween(0,3),
        'time'=>Carbon::now()->add(($faker->numberBetween(0,3)),'day'),
        'user_id'=>3,
    ];
});
