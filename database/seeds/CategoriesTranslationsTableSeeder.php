<?php

use Illuminate\Database\Seeder;

class CategoriesTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $languages = Config::get('languages.supported');
        factory(App\Models\CategoriesTranslations::class,6)->create()->each(function ($u,$count = 0) {
            $count++;
            if($count == 1){
              $u->language = 'en';
              $u->categories_id = 1;
            }

            if($count == 2){
              $u->language = 'ar';
              $u->categories_id = 1;
            }


            if($count == 3){
              $u->language = 'en';
              $u->categories_id = 2;
            }

            if($count == 4){
              $u->language = 'ar';
              $u->categories_id = 2;
            }

            if($count == 5){
              $u->language = 'en';
              $u->categories_id = 3;
            }

            if($count == 6){
              $u->language = 'ar';
              $u->categories_id = 3;
            }

            $u->save();
        });
    }
}
