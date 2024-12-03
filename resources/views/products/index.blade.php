@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #000;
        color: white;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }
    .btn {
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }
</style>

    <h1 style="color: white;">Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Añadir Producto</a>
    @if($products->isEmpty())
        <p style="color: white;">No hay productos disponibles.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">
                        {{ $product->nombre }} - {{ $product->precio }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
