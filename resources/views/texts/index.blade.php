@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Textos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('texts.create') }}" class="btn btn-primary">Crear Nuevo Texto</a>

    <ul>
        @foreach($texts as $text)
            <li>{{ $text->content }}</li>
        @endforeach
    </ul>
</div>
@endsection