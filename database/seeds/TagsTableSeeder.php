<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tags::class,3)->create()->each(function ($u,$count = 0) {
            $count++;
            $u->id = $count;
            $u->save();
        });
    }
}
