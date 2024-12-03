@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #000;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: auto;
        }
        label {
            margin-top: 10px;
            color: white;
        }
        input, select, textarea {
            margin-top: 5px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #333;
            color: white;
        }
        input::placeholder, textarea::placeholder {
            color: #888;
        }
        input:focus, textarea:focus, select:focus {
            color: black;
            background-color: white;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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

    <h1 style="text-align: center;">Añadir Inventario</h1>
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <label for="product_id">Producto:</label>
        <select name="product_id" id="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->nombre }}</option>
            @endforeach
        </select>
        
        <label for="cantidad">Cantidad:</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
        
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('inventory.index') }}" class="btn">Volver al Inventario</a>
@endsection
