<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name_site'  => 'admin',
            'email'      => 'admin@admin.com',
            'phone'      =>  mt_rand(100000000,999999999),
            'address'    =>  'cairo',
            'logo'       => 'http://lorempixel.com/g/200/100/',
            'fav'        => 'http://lorempixel.com/g/200/100/',

            'brief_site' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',

            'meta_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',

            'meta_keywords' => 'blog,artical',
            'created_at'    => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
