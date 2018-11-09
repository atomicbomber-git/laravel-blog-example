<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'content' => $faker->realText
    ];
});
