<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Registered',
            ],
        ];

        foreach($roles as $_item){
            $role = Role::firstOrCreate([
                'name' => $_item['name']
            ]);
            // echo $role->name . ' - Done' . PHP_EOL;
        }
    }
}
