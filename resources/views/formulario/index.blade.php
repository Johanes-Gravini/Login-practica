@extends('layouts.app')


@section('content')
<div class="container mx-auto w-3/5 p-4 mt-12 bg-white dark:bg-gray-800 text-slate-950 dark:text-white sm:rounded-lg">
  <div class="flex flex-col justify-between p-2 h-full shadow-lg shadow-slate-600 sm:rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Gestión de Solicitudes</h1>
    <p class="mb-6">Crear, revisar y administrar tus solicitudes de prestamos</p>

    @if (session('success'))
      <div class="px-4 py-3 rounded relative mb-4 bg-green-100 border border-green-400 text-green-700" role="alert">
        <strong class="font-bold">Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

    <a href="{{ route('form.show') }}" class="w-48 ml-5 px-4 py-2 bg-blue-700 text-white hover:bg-blue-600 rounded">
      Crear nueva Solicitud
    </a>

    <table class="table-auto w-full mt-6">
      <thead class="bg-gray-200 dark:bg-gray-700">
        <tr>
          <th class="px-4 py-2 text-left">Nombre</th>
          <th class="px-4 py-2 text-left">Opción</th>
          <th class="px-4 py-2 text-left">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($prestamos as $prestamo)
          <tr class="border-b border-gray-300">
            <td class="px-4 py-2">{{ $prestamo->name }}</td>
            <td class="px-4 py-2">{{ $prestamo->options }}</td>
            <td class="px-4 py-2">
              <a href="{{ route('pdf.pdf', $prestamo->id) }}" class="text-blue-700 hover:text-blue-500">
                Visualizar
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection