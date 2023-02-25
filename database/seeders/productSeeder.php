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
        // *faccio*
        Product::factory()->count(200)->make()->each(function ($p) {
            // create() = make() + save()

            // FOREIGN KEY  (dentro la tabella)
            //*associo* 
            // recuperiamo tipologia casuale
            $typology = Typology::inRandomOrder()->first();
            // la assegno al prodotto $p
            $p->typology()->associate($typology);

            // *salvo*
            $p->save();

            // MANY TO MANY (con una tabella apposta per le chiavi di relazione)
            // prendiamo da una a 5 categorie casuali
            $categories = Category::inRandomOrder()->limit(rand(1, 5))->get();
            // le associamo al prodotto $p
            $p->categories()->attach($categories);
        });
    }
}
// le chiavi esterne vanno valorizzate prima della save
// tutte le relazioni molti a molti (con tabella ponte) vanno valorizzate dopo la save

// 'creo prodotto'                    
// 'prendo tipologia da db'           
// 'associo prodotto alla tipologia' 
// 'salvo il prodotto'                
