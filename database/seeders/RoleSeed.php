<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $super_admin = Role::create([
            'name' => 'super_admin' ,
            'display_name' => 'سوبر ادمن' ,
            'description' => 'سوبر ادمن' ,
        ]);
       $admin = Role::create([
            'name' => 'buyer' ,
            'display_name' => 'تاجر' ,
            'description' => 'ادمن' ,
        ]);
        $user = Role::create([
            'name' => 'user' ,
            'display_name' => 'user' ,
            'description' => 'user can do somethings' ,
        ]);

       $users_perm = Permission::create([
            'name' => 'users_perm' ,
            'display_name' => 'ادارة المستخدمين' ,
            'description' => 'ادارة المستخدمين' ,
        ]);
        $roles_perm = Permission::create([
            'name' => 'roles_perm' ,
            'display_name' => 'ادارة الصلاحيات' ,
            'description' => 'ادارة الصلاحيات' ,
        ]);
        $super_admin->attachPermissions([$users_perm , $roles_perm]);
        
    }

}
