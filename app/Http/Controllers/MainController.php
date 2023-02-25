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
        return view('pages.product.home', compact('products'));
    }
    public function productCreate()
    {
        $typologies = Typology::all();

        return view('pages.product.create', compact('typologies'));
    }
    public function productStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
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

        return redirect()->route('home');
    }
}
