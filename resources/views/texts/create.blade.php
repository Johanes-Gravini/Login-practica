@extends('layouts.app')

@section('content')
<div class="container bg-dark text-white p-4 rounded">
    <h1 class="text-2xl font-bold mb-4">Crear Nuevo Texto</h1>
    <form action="{{ route('texts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium">Contenido</label>
            <input type="text" name="content" id="content" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
        <button type="submit" class="btn btn-primary"> Crear</button>
    </form>
</div>
@endsection