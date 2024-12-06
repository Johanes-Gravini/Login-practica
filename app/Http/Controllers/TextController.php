<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;

class TextController extends Controller
{
    //
    public function index()
    {
        // Obtener todos los textos de la base de datos
        $texts = Text::all();
        
        // Pasar los textos a la vista
        return view('texts.index', compact('texts'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo texto
        return view('texts.create');
    }

    public function store(Request $request)
    {
        // Validar y guardar el nuevo texto
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Text::create($request->only('content'));

        return redirect()->route('texts.index')->with('success', 'Texto creado con éxito.');
    }
}
