<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mangaers')->insert([
            'name'       => 'admin',
            'email'      => 'admin@admin.com',
            'password'   => bcrypt('123456'),
            'phone'      => mt_rand(100000000,999999999),
            'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}


