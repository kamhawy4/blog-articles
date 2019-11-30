<?php

use Faker\Generator as Faker;


$factory->define(App\Models\TagsTranslations::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'slug'           => str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($faker->name)))),
        'language'        => 'ar',
        'tags_id'          =>  1,
        'created_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'      => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});
