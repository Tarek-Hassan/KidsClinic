<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\About;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) {
    return [
        // 'body'=>$faker->text(),
        'body'=>'   <h2 class="wow fadeInUp animated" data-wow-delay="0.6s" style="font-family: Poppins, sans-serif; font-weight: 600; line-height: inherit; color: rgb(39, 39, 39); font-size: 3em; letter-spacing: -1px; padding-bottom: 10px; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeInUp; visibility: visible; animation-delay: 0.6s;">Welcome to Your Health Center</h2><div class="wow fadeInUp animated" data-wow-delay="0.8s" style="animation-duration: 1s; animation-fill-mode: both; animation-name: fadeInUp; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; visibility: visible; animation-delay: 0.8s;"><p style="color: rgb(117, 117, 117); font-size: 14px; line-height: 24px;">Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p><p style="color: rgb(117, 117, 117); font-size: 14px; line-height: 24px;">Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p></div>',
    ];
});
