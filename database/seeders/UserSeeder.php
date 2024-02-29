<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
		$user = new User([
            'number_id'=>'1004752032',
            'name'=>'Leslie',
            'last_name'=>'Ramirez',
            'email'=>'leslieramirezparra@gmail.com',
            'password'=>'123456789',
            'remember_token'=> Str::random(10),
        ]);
        $user->save();
        $user->assignRole('admin');
    }
}
