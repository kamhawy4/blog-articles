<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;


$factory->define(App\Models\ArticleTranslation::class, function (Faker $faker) {
 
    return [
        'title'           => $faker->name,
        'description'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        'slug'            => str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($faker->name)))),
        'created_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});