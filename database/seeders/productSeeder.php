<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class productSeeder extends Seeder
{

    public function run()
    {

        Product::factory()->count(20)->make()->each(function ($p) {
            // recuperiamo tipologia casuale
            $typology = Typology::inRandomOrder()->first();
            // la assegno al prodotto $p
            $p->typology()->associate($typology);


            // le chiavi esterne vanno valorizzate prima della save
            $p->save();
            // tutte le relazioni molti a molti (con tabella ponte)
            // vanno valorizzate dopo la save

            // prendiamo da una a 5 categorie casuali
            $categories = Category::inRandomOrder()->limit(rand(1, 5))->get();
            // le associamo al prodotto $p
            $p->categories()->attach($categories);
        });
    }
}
