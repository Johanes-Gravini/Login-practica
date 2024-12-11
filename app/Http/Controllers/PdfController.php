<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.pdf');

        return $pdf->stream();
    }

    public function showForm()
    {
        return view('Formulario.formulario');
    }

    public function submitForm(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|max:255',
            'value' => 'required|numeric',
            'purpose' => 'required',
        ]);

        // Aquí puedes manejar los datos como desees
        // Por ejemplo, guardarlos en la base de datos o enviar un correo

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('form.show')->with('success', 'Formulario enviado correctamente');
    }
}
