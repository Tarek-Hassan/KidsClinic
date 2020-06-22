<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'phone'=>$faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'body'=>$faker->text(),
    ];
});
