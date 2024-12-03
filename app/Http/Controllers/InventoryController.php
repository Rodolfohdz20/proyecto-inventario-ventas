<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; 
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with('product')->get(); 
        return view('inventory.index', compact('inventory')); 
    } 
    public function create() 
    { 
        $products = Product::all();
        return view('inventory.create', compact('products'));
    } 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'product_id' => 'required|exists:products,id', 
            'cantidad' => 'required|integer', 
        ]); 
        try { 
            // Buscar inventario existente para el producto 
            $inventory = Inventory::where('product_id', $request->product_id)->first(); 
            if ($inventory) { 
                // Si existe, actualizar la cantidad 
                $inventory->cantidad += $request->cantidad; 
                $inventory->save(); 
            } else { 
                // Si no existe, crear un nuevo registro de inventario 
                Inventory::create($request->all()); 
            } 
            return redirect()->route('inventory.index')->with('success', 'Inventario actualizado correctamente.'); 
        } catch (ModelNotFoundException $e) { 
            return redirect()->route('inventory.create')->withErrors('Producto no encontrado.'); 
        } 
    }
}
