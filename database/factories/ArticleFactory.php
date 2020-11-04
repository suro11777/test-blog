<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->unique()->name();
    $slug = create_slug($title);
    $count_like = $faker->numberBetween(100,1000000);
    return [
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->text,
        'count_like' => $count_like,
        'count_watch' => $count_like+$faker->numberBetween(0,5000),
        'created_at' => $faker->dateTimeBetween(),
    ];
});
