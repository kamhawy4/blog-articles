<?php

use Faker\Generator as Faker;



$factory->define(App\Models\ArticleTags::class, function (Faker $faker) {
    return [
        'article_id'     => rand(1,3),
        'tag_id'         => rand(1,3),
        'created_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});
