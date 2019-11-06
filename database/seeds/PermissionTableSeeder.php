<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'settings',
           'sendmail',

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'social-list',
           'social-create',
           'social-edit',
           'social-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'category-list',
           'category-create',
           'category-edit',
           'category-delete',

           'tag-list',
           'tag-create',
           'tag-edit',
           'tag-delete',

           'article-list',
           'article-create',
           'article-edit',
           'article-delete',
           'comment-list',
           'comment-delete',

           'log-list',
           'log-delete',
           

        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}