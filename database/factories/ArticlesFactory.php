<?php

use Faker\Generator as Faker;



$factory->define(App\Models\Articles::class, function (Faker $faker) {
    return [
          'author'          => 'admin',
          'image'           => 'http://lorempixel.com/g/800/800/',
          'type'            => 'active',
          'categorie_id'    => rand(1,6),
    ];
});
