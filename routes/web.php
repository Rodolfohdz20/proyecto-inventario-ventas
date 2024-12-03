<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\SaleController; 
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/products/index', [ProductController::class,'index'])->name('products.index');
Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products', [ProductController::class,'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class,'show'])->name('products.show');


Route::get('/sales/index', [SaleController::class,'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class,'create'])->name('sales.create');
Route::post('/sales', [SaleController::class,'store'])->name('sales.store');


Route::get('/inventory/index', [InventoryController::class,'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class,'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class,'store'])->name('inventory.store');

require __DIR__.'/auth.php';
