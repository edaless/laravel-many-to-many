<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class MainController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        return view('pages.home', compact('categories'));
    }
    public function products()
    {
        $products = Product::all();

        return view('pages.product.productHome', compact('products'));
    }
    public function productCreate()
    {
        $typologies = Typology::all();
        $categories = Category::all();

        return  view(
            'pages.product.create',
            compact('typologies', 'categories')
        );
    }
    public function productStore(Request $request)
    {

        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array',
        ]);

        $code = rand(10000, 99999);
        $data['code'] = $code;

        // creo prodotto                                          
        $product = Product::make($data);
        // prendo tipologia da db                           
        $typology = Typology::find($data['typology_id']);

        // associo prodotto alla tipologia                               
        $product->typology()->associate($typology);
        // salvo il prodotto                                    
        $product->save();

        $categories = Category::find($data['categories']);
        $product->categories()->attach($categories);


        return redirect()->route('home');
    }
    public function productEdit(Product $product)
    {
        $typologies = Typology::all();
        $categories = Category::all();

        return view('pages.product.edit', compact('product', 'typologies', 'categories'));
    }
    public function productUpdate(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array',
        ]);

        // aggiorno prodotto                                          
        $product->update($data);
        // prendo tipologia da db                           
        $typology = Typology::find($data['typology_id']);

        // associo prodotto alla tipologia                               
        $product->typology()->associate($typology);
        // salvo il prodotto                                    
        $product->save();

        $categories = Category::find($data['categories']);
        $product->categories()->sync($categories);


        return redirect()->route('home');
    }
    public function productDelete(Product $product)
    {
        // devo eliminare tutte le righe della rabella ponte che contengono l'id del prodotto che sto per eliminare
        $product->categories()->sync([]);


        // elimino il prodotto
        $product->delete();


        return redirect()->route('home');
    }
}
