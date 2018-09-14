<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence(6, true),
       'body' => $faker->paragraph(6, false),
       'published_at' => $faker->dateTimeThisMonth(),
       'user_id' =>  App\User::pluck('id')->random(),
       'view' => $faker->numberBetween(0, 9000),
       'image' => 'uploads/540.jpg'
    ];
});
