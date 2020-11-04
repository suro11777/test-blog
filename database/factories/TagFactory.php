<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    return [
        'tag'=>$faker->country
    ];
});
