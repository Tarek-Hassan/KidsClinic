<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name'=> $faker->word,
        'age'=>$faker->numberBetween(1,3),
        'blood_type'=>$faker->numberBetween(0,8),
        'birth_type'=>$faker->numberBetween(0,2),
        'number'=>$faker->numberBetween(1,5),
        'dad_job'=>$faker->word,
        'mum_job'=>$faker->word,
        'phone'=>$faker->e164PhoneNumber,
        'address'=>$faker->address,
        'notes'=>$faker->text(),
        'doctor_id'=>$faker->numberBetween(1,6),

        //
    ];
});
