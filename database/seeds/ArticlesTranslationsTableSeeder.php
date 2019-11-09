<?php

use Illuminate\Database\Seeder;

class ArticlesTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ArticleTranslation::class,6)->create()->each(function ($u) {
            $u->save();
        });
    }
}
