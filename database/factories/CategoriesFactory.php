<?php

use Faker\Generator as Faker;



$factory->define(App\Models\Categories::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'slug'           => str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($faker->name)))),
        'created_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});
