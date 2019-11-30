<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Categories::class,3)->create()->each(function ($u,$count = 0) {
             $count++;
             $u->id =  $count;
             $u->save();
        }); 
    }
}
