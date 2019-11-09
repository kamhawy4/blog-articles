<?php

use Faker\Generator as Faker;



$factory->define(App\Models\Articles::class, function (Faker $faker) {
    return [
        'published'    => rand(1,6)
    ];
});
