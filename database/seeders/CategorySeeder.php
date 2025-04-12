<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Skincare']);
        Category::create(['name' => 'Haircare']);
        Category::create(['name' => 'Makeup']);
    }
}
