<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        // 'title','body','image','doctor_id'
        'title'=>$faker->word,
        'body'=>$faker->text(),
        'image'=>"images/bg".$faker->numberBetween(1,12).".jpg",
        'doctor_id'=>$faker->numberBetween(1,6),
    ];
});
