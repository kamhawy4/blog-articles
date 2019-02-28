<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CommentArticle::class, function (Faker $faker) {
    return [
        'title'          => $faker->title,
        'name'           => $faker->name,
        'article_id'     => rand(1,6),
        'created_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});