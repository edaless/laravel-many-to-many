<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class categorySeeder extends Seeder
{

    public function run()
    {
        Category::factory()->count(10)->create();
    }
}
