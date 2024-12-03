<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; 
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaleController extends Controller
{
    public function index()
     { 
        $sales = Sale::with('product')->get(); 
        return view('sales.index', compact('sales')); 
    } 
    public function create() 
    { 
        $products = Product::all(); 
        return view('sales.create', compact('products'));
    }
    public function store(Request $request) 
    { 
        $request->validate([ 
            'product_id' => 'required|exists:products,id', 
            'cantidad' => 'required|integer', 
            'precio_total' => 'required|numeric', 
        ]); 
        try { 
            // Crear la venta 
            $sale = Sale::create($request->all()); 
            // Actualizar el inventario 
            $inventory = Inventory::where('product_id', $request->product_id)->firstOrFail();
            $inventory->cantidad -= $request->cantidad; 
            $inventory->save(); 
            return redirect()->route('sales.index')->with('success', 'Venta realizada y inventario actualizado correctamente.'); 
        } catch (ModelNotFoundException $e) { 
            return redirect()->route('sales.create')->withErrors('Producto no encontrado en el inventario.'); 
        } 
    }
}
