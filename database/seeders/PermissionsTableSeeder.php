<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
             #home
             [
                 'name' => 'home_access',
             ],
             #users
             [
                 'name' => 'users_access'
             ],
             #permissions
             [
                 'name' => 'permission_create',
             ],
             [
                 'name' => 'permission_edit',
             ],
             [
                 'name' => 'permission_show',
             ],
             [
                 'name' => 'permission_delete',
             ],
             [
                 'name' => 'permission_access',
             ],
             #role
             [
                 'name' => 'role_create',
             ],
             [
                 'name' => 'role_edit',
             ],
             [
                 'name' => 'role_show',
             ],
             [
                 'name' => 'role_delete',
             ],
             [
                 'name' => 'role_access',
             ],
             #user
             [
                 'name' => 'user_create',
             ],
             [
                 'name' => 'user_edit',
             ],
             [
                 'name' => 'user_show',
             ],
             [
                 'name' => 'user_delete',
             ],
             [
                 'name' => 'user_access',
             ],
             #Advanced
             [
                 'name' => 'advanced_access',
             ],
             #audit_log
             [
                 'name' => 'audit_log_show',
             ],
             [
                 'name' => 'audit_log_access',
             ],
             [
                 'name' => 'clear_cache_access'
             ],
             [
                 'name' => 'change_log_access'
             ],
             [
                 'name' => 'profile_password_edit'
             ],
         ];

        foreach($permissions as $_item){
            $permission = Permission::firstOrCreate([
                'name' => $_item['name']
            ]);
            // echo $permission->name . ' - Done' . PHP_EOL;
        }
    }
}
