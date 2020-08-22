<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName(),
        'desc' => $faker->paragraph(150),
        'image' => $faker->imageUrl(300, 300)
    ];
});
