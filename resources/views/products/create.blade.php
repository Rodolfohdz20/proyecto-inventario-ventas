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
        }
        input, textarea, button {
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
        input:focus, textarea:focus {
            color: black; /* Cambia el color de la letra cuando se escribe */
            background-color: white; /* Asegura que el fondo sea blanco cuando se escribe */
        }
        textarea {
            background-color: #fff; /* Fondo blanco por defecto para el campo de descripción */
            color: black; /* Letra negra por defecto para el campo de descripción */
        }
        button {
            background-color: #007bff;
            border-color: #007bff;
            cursor: pointer;
            color: white;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>

    <h1 style="text-align: center;">Añadir Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto">
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" placeholder="Descripción del producto"></textarea>
        
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" placeholder="Precio del producto">
        
        <button type="submit">Guardar</button>
    </form>
@endsection
