<?php

use Illuminate\Database\Seeder;

class ArticlesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ArticleTags::class,6)->create()->each(function ($u) {
            $u->save();
        });
    }
}
