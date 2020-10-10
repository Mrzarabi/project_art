<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName(),
        'desc' => $faker->sentence(10),
        'image' => $faker->imageUrl(300, 300)
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName(),
        'desc' => $faker->sentence(10),
        'body' => $faker->sentence(10)
    ];
});
