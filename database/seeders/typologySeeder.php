<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;

class typologySeeder extends Seeder
{

    public function run()
    {
        Typology::factory()->count(5)->create();
    }
}
