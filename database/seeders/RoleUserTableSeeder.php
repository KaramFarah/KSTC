<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        #Add Admin user to Admin Role
        User::findOrFail(1)->roles()->sync(1);
        DB::insert('insert into role_user (user_id, role_id) values (1, 1)');
        
    }
}
