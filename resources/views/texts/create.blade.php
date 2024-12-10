@extends('layouts.app')

@section('content')
<div class="relative h-screen flex text-white rounded">
    <div class="relative m-auto shadow-2xl w-3/4 bg-emerald-800 p-5 rounded-2xl">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Texto</h1>
        <form action="{{ route('texts.store') }}" method="POST" class="flex flex-col justify-between h-full shadow-2xl p-2">
            @csrf
            <!-- Formulario alineado a la izquierda -->
            <div class="flex flex-col">
                <div class="mb-4">
                    <!-- <label for="content" class="font-normal">Contenido</label> -->
                    <textarea 
                        name="content" 
                        id="content"
                        rows="4"
                        class="block w-3/4 m-auto border-gray-500 rounded-md shadow-sm shadow-black focus:ring focus:ring-opacity-80 text-gray-700 resize-y overflow-auto"
                        placeholder="Escribe aquí tu texto..."
                        required>
                    </textarea>
                </div>
            </div>
            <!-- Botón en la esquina inferior derecha -->
            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear</button>
            </div>
        </form>
    </div>
</div>
@endsection