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

    <h1>Ventas</h1>
    @if(session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
    @endif 
    @if($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
    @endif
    <a href="{{ route('sales.create') }}" class="btn">Añadir Venta</a>
    <ul>
        @foreach($sales as $sale)
            <li>
                <span>{{ $sale->product->nombre }} - Cantidad: {{ $sale->cantidad }} - Total: {{ $sale->precio_total }}</span>
            </li>
        @endforeach
    </ul>
@endsection
