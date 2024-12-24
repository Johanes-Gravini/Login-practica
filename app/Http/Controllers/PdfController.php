<?php

namespace App\Http\Controllers;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PdfController extends Controller
{
    //
    public function index()
    {
        // Obtener todos los registros PRESTAMOS de la base de datos
        $prestamos = Prestamo::all();
        
        // Pasar los registros PRESTAMOS a la vista
        return view('formulario.index', compact('prestamos'));
    }

    public function pdf($id)
    {
        // Obtener los registro de la tabla 'prestamos'
        $prestamo = Prestamo::findOrFail($id);

        // Carga la vista y apsa los datos
        $pdf = Pdf::loadView('pdf.pdf1', ['prestamo' => $prestamo]);

        return $pdf->stream('prestamos.pdf');
    }

    public function showForm()
    {
        return view('Formulario.formulario');
    }

    public function showFormAdmin($id)
    {
        // Obtener el registro específico de la tabla 'prestamos'
        $prestamo = Prestamo::findOrFail($id);
        return view('Formulario.admin', compact('prestamo'));
    }

    public function submitForm(Request $request)
    {
        try {
            //code...
            $validated = $request->validate([
                'options'   => 'required|in:solicitud_prestamo,anticipo_arriendo_moto,anticipo_sueldo',
                'name'      => 'required|max:255|regex:/^[\pL\s]+$/u',
                'cc'        => 'required|numeric|digits:10',
                'value'     => 'required|numeric',
                'discount'  => 'nullable|numeric',
                'purpose'   => 'required|min:10|max:300|regex:/^[a-zA-Z0-9\s\-]+$/',
                'employee'  => 'required|max:255|regex:/^[\pL\s]+$/u',
                'date'      => 'required|date',
            ], [
                'options.required' => 'Este campo es obligatorio.',
                'options.in'       => 'El tipo de solicitud debe ser uno de los siguientes: solicitud_prestamo, anticipo_arriendo_moto, anticipo_sueldo.',
                'name.required'    => 'El campo nombre es obligatorio.',
                'name.regex'       => 'El nombre solo puede contener letras y espacios.',
                'cc.required'      => 'El campo cédula es obligatorio.',
                'cc.numeric'       => 'La cédula debe ser un número.',
                'cc.digits'        => 'La cédula debe tener exactamente 10 dígitos.',
                'value.required'   => 'El campo valor es obligatorio.',
                'value.numeric'    => 'El valor debe ser un número.',
                'discount.numeric' => 'El descuento debe ser un número.',
                'purpose.required' => 'El campo propósito es obligatorio.',
                'purpose.min'      => 'El propósito debe tener al menos 10 caracteres.',
                'purpose.max'      => 'El propósito no puede tener más de 300 caracteres.',
                'purpose.regex'    => 'El propósito solo puede contener letras, números, espacios y guiones.',
                'employee.required'=> 'El campo empleado es obligatorio.',
                'employee.regex'   => 'El nombre del empleado solo puede contener letras y espacios.',
                'date.required'    => 'El campo fecha es obligatorio.',
                'date.date'        => 'La fecha no es válida.',
            ]);
    
            // Crear un nuevo registro en la base de datos
            Prestamo::create($validated);
    
            // Redirigir al formulario con mensaje de éxito
            return redirect()->route('form.show')->with('success', 'Formulario enviado correctamente');
        } catch (ValidationException $e) {
            return redirect()->route('form.show')
                            ->with('error', 'Se han ingresado datos invalidos')
                            ->withErrors($e->errors()) // errors solo funciona con ValidationException
                            ->withInput(); // mantiene el input anterior

        } catch (\Throwable $e) {
            return redirect()->route('form.show')
                            ->withErrors('Ocurrió un error inesperado. Intenta de nuevo.')
                            ->withInput();
        }
    }

    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        return view('pdf.pdf1', compact('prestamo'));
    }
}