<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
     { 
        $products = Product::all(); 
        return view('products.index', compact('products'));
     } 

     public function create()
      { 
        return view('products.create');
     } 

     public function store(REQUEST $request) 
     { 
        $request->validate([ 
            'nombre' => 'required',
            'descripcion' => 'required', 
            'precio' => 'required|numeric', 
        ]);
        Product::create($request->all());
        return redirect()->back();
     }
    public function show($id)
    { 
        try { 
            $product = Product::findOrFail($id); 
            return view('products.show', compact('product')); 
        } catch (ModelNotFoundException $e) { 
            return redirect()->route('products.index')->withErrors('Producto no encontrado'); 
        }
    }
}
