<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }


    public function store(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'file' => 'required|file|max:2048', // Asegúrate de que sea un archivo y no exceda 2MB
        ]);

        // Almacenar el archivo en el directorio 'uploads'
        $path = $request->file('file')->store('uploads');

        // Aquí puedes agregar lógica adicional, como guardar la ruta en la base de datos

        return redirect()->route('upload')->with('success', 'Archivo subido exitosamente.');
    }
}
