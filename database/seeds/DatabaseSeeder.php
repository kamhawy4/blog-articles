<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SocialLinksTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticlesTranslationsTableSeeder::class);
        $this->call(ArticlesTagsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CommentsArticlesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
