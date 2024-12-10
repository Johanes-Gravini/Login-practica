@extends('layouts.app')


@section('content')
<div class=" container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Mi Lista de Textos</h1>
        <p class="mb-6">Esta es una lista de textos que se pueden crear, leer, actualizar y eliminar.</p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <a href="{{ route('texts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear Nuevo Texto</a>

        <ul class="mt-4">
            @foreach($texts as $text)
                <li class="border-b border-gray-300 py-2">
                    <a href="#" class="text-blue-500 hover:text-blue-700">{{ $text->content }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection