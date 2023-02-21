<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([

            typologySeeder::class,
            categorySeeder::class,
            productSeeder::class,
        ]);
    }
}
