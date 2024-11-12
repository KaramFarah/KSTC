<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'           => 'Super Admin',
                'email'          => 'admin@alZeer.net',
                // admin@alZeer.net
                'password'       => Hash::make('123123123'),
                'remember_token' => null,
            ],
        ];
        foreach($users as $_item){
            if (!$user = user::where('email', $_item['email'])->first()){
                $user = User::firstOrCreate($_item);
                // echo $user->email . ' - Done' . PHP_EOL;
            }
            else{
                //echo $user->email . ' - Exists' . PHP_EOL;
            }
            
        }
    }
}
