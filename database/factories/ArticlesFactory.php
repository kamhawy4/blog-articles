<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
 
    return [
        'title'           => $faker->name,
        'description'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        'author'          => 'admin',
        'image'           => 'http://lorempixel.com/g/800/800/',
        'type'            => 'active',
        'categorie_id'    => rand(1,6),
        'slug'            => str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($faker->name)))),
        'created_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});