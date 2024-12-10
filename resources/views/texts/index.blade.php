@extends('layouts.app')


@section('content')
<div class="container mx-auto w-3/5 p-4 mt-12 bg-white dark:bg-gray-800 text-slate-950 dark:text-white sm:rounded-lg">
    <div class="flex flex-col justify-between p-2 h-full shadow-lg shadow-slate-600 sm:rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Mi Lista de Textos</h1>
        <p class="mb-6">Esta es una lista de textos que se pueden crear, leer, actualizar y eliminar.</p>
    
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
    
        <a href="{{ route('texts.create') }}" class="w-44 ml-5 px-4 py-2 bg-blue-700 text-white hover:bg-blue-600 rounded">
            Crear Nuevo Texto
        </a>
    
        <ul class="mt-4">
            @foreach($texts as $text)
                <li class="flex items-center justify-between py-2 px-4 border-b border-gray-300">
                        <a href="#" class="text-slate-950 dark:text-white">{{ $text->content }}</a>

                        <button type="submit" class="inline-flex px-4 py-2 bg-red-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            
                            Delete
                        </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection