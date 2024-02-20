<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call([
            // RoleAndPermissionSeeder::class,
            CategorySeeder::class,
            UserSeeder::class
        ]);
		User::factory(10)->create();
		Category::factory(20)->create();
    }
}
