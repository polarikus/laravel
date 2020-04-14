<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;
$factory->define(News::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\ru_RU\Text($faker));
    return [
        'title' => $faker->realText(rand(10,15)),
        'text' => $faker->realText(rand(200,400)),
        'id_category' => (int)rand(1,2)
    ];
});
