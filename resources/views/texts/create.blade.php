@extends('layouts.app')

@section('content')
<div class="relative h-screen text-slate-950 dark:text-white rounded">
    <div class="relative w-1/4 p-2 mt-12 ml-6 bg-white dark:bg-gray-800 shadow-lg shadow-slate-600 sm:rounded-lg">
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
                        rows="1"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                        placeholder="Escribe aquí tu texto..."
                        required>
                    </textarea>
                </div>
            </div>
            <!-- Botón en la esquina inferior derecha -->
            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection