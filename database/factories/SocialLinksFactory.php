<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SocialLinks::class, function (Faker $faker) {
    return [
        'name'           => 'facebook',
        'url'            => 'https://www.facebook.com',
        'created_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'     => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});