<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'phone'=>$faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'body'=>'<p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit
        consequat ultricies.</p>',
        'worktime'=>'<p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
        <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
        <p>Sunday <span>Closed</span></p>',
    ];
});
