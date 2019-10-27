<?php

use Illuminate\Database\Seeder;
use App\Models\Mangaers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $user = Mangaers::create([
        	'name' => 'Hardik Savani', 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456')
        ]);
  
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}
