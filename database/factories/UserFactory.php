<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'), // password
        'remember_token' => Str::random(10),
        'role'=>$faker->numberBetween(0,1),
        'mobile'=>$faker->e164PhoneNumber,
        'national_id'=>$faker->isbn10,
        'patient_id'=>$faker->numberBetween(1,20),
        'bio'=>$faker->paragraph(),
    ];
});
