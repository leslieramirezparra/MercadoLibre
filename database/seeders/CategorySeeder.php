<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::Create(['name'=>'Bicicletas']);
        Category::Create(['name'=>'Cosmeticos']);
        Category::Create(['name'=>'Cocina']);
    }
}
