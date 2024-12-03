@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #000;
            color: white;
        }
        h1 {
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

    <h1>Inventario</h1>
    <a href="{{ route('inventory.create') }}" class="btn">Añadir Inventario</a>
    <ul>
        @foreach($inventory as $item)
            <li>
                <span>{{ $item->product->nombre }} - Cantidad: {{ $item->cantidad }}</span>
            </li>
        @endforeach
    </ul>
@endsection
