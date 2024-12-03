@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #000;
            color: white;
        }
        h1, p {
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
            background-color: #007bff;
            border: none;
            color: white;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>

    @if($product)
        <h1>{{ $product->nombre }}</h1>
        <p>{{ $product->descripcion }}</p>
        <p>Precio: {{ $product->precio }}</p>
        <a href="{{ route('products.index') }}" class="btn">Volver a la lista de productos</a>
    @else
        <p>Producto no encontrado</p>
        <a href="{{ route('products.index') }}" class="btn">Volver a la lista de productos</a>
    @endif
@endsection

