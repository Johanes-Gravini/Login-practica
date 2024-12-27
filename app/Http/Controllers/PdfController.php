<?php

namespace App\Http\Controllers;
use App\Models\Prestamo;
use App\Models\PrestamosAdmin;
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
        $prestamo = Prestamo::findOrFail($id); // Obtiene el préstamo por ID
        return view('Formulario.admin', compact('prestamo')); // Pasa el préstamo a la vista
    }

    public function submitForm(Request $request, $id = null)
    {
        // dd($request->all());
        try {
            // Obtener el nobre de la ruta
            $routeName = $request->route()->getName();
            // dd($routeName, $id);
            // Configurar reglas y mensajes según la ruta
            
            if ($routeName === 'form.submit'){
                // Validaciones específicas para el formulario de usuarios
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
                return redirect()->route('formulario.index')->with('success', 'Formulario enviado correctamente');
            } elseif ($routeName === 'form.submit.admin'){
                // logica para la validación de los datos del formulario admin...
                $validated = $request->validate([
                    'balance'   => 'required|numeric',
                    'maturity'  => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
                    'payments'  => 'required|numeric',
                    'entrydate' => 'required|date',
                    'salary'    => 'required|numeric',
                    'date'      => 'required|date',
                    'responsible_report'    => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
                    'payment_status'        => 'required|in:approved,no-approvend',
                    'signature'             => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
                    'approved_amount'       => 'required|numeric',
                    'payment_frequency'     => 'required|in:quincenales,mensuales,no-aplica',
                    'from'                  => 'required|date',
                    'new_discounts'         => 'nullable|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
                    'input_approved'        => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
                    'date_approved'         => 'required|date',
                    // Validaciones para las libranzas
                    'comfenalco_mensual'        => 'nullable|numeric',
                    'comfenalco_saldo'          => 'nullable|numeric',
                    'combarranquilla_mensual'   => 'nullable|numeric',
                    'combarranquilla_saldo'     => 'nullable|numeric',
                    'otros_mensual'             => 'nullable|numeric',
                    'otros_saldo'               => 'nullable|numeric',
                ], [
                    'balance.required'  => 'El balance es obligatorio.',
                    'balance.numeric'   => 'El balance debe ser un número válido',

                    'maturity.required' => 'El vencimiento es obligatorio.',
                    'maturity.string'   => 'El vencimiento debe ser un texto',
                    'maturity.max'      => 'El vencimiento no puede exceder los 255 caracteres.',
                    'maturity.regex'    => 'Solo permite letras, números y espacios.',

                    'payments.required' => 'Los pagos son obligatorios.',
                    'payments.numeric'  => 'Los pagos deben ser un numero válido.',

                    'entrydate.required'=> 'La fecha de entrada es obligatoria.',
                    'entrydate.date'    => 'Ingrese una fecha válida.',

                    'salary.required'   => 'El salario es obligatorio.',
                    'salary.numeric'    => 'El salario debe ser un número válido',

                    'date.required'     => 'La fecha es obligatoria.',
                    'date.date'         => 'Ingrese una fecha valida', 

                    'responsible_report.required'   => 'El responsable del informe es obligatorio.',
                    'responsible_report.string'     => 'Solo permite texto.',
                    'responsible_report.max'        => 'No debe exceder los 255 caracteres.',
                    'responsible.regex'             => 'Solo permite letras, números y espacios.',

                    'payment_status.required'       => 'El estado del pago es obligatorio.',
                    'payment_status.in'             => 'Solo permite "approved" o "no-approvend".',

                    'signature.required'            => 'La firma es obligatoria.',
                    'signature.string'              => 'Solo permite texto.',
                    'signature.max'                 => 'No debe exceder los 255 caracteres.',
                    'signature.regex'               => 'Solo permite letras, números y espacios.',

                    'approved_amount.required'      => 'El monto aprobado es obligatorio.',
                    'approved_amount.numeric'       => 'El monto aprobado debe ser un número válido.',

                    'payment_frequency.required'    => 'La frecuencia de pago es obligatoria.',
                    'payment_frequency.in'          => 'Solo permite "quincenales" o "mensuales".',

                    'from.required'                 => 'La fecha de inicio es obligatoria.',
                    'from.date'                     => 'Requiere una fecha válida.',

                    'new_discounts.nullable'        => 'Si asegúrate de que sean texto y no excedan los 255 caracteres.',
                    'new_discounts.string'          => 'Solo permite el ingreso de textos', 
                    'new_discounts.max'             => 'No puede exceder los 255 caracteres.', 
                    'new_discounts.regex'           => 'Solo permite letras, números y espacios.', 

                    'input_approved.required'       => 'El campo de entrada aprobado es obligatorio.',
                    'input_approved.string'         => 'Solo acepta texto.',
                    'input_approved.max'            => 'No puede exceder los 255 caracteres.',
                    'input_approved.regex'          => 'Solo permite letras, números y espacios.',

                    'date_approved.required'        => 'La fecha de aprobación es obligatoria.',
                    'date_approved.date'            => 'La fecha de aprobación debe ser correcta.',

                    // Validaciones para las libranzas
                    'comfenalco_mensual.nullable'   => 'asegúrate de que sea un número válido.',
                    'comfenalco_mensual.numeric'    => 'Asegúrate de que no contenga caracteres no numéricos.',
                    
                    'comfenalco_saldo.nullable'     => 'Asegúrate de que sea un número válido.',
                    'comfenalco_saldo.numeric'      => 'Asegúrate de que no contenga caracteres no numéricos.',
                    
                    'combarranquilla_mensual.nullable'  => 'Asegúrate de que sea un número válido.',
                    'combarranquilla_mensual.numeric'   => 'El monto mensual de Combarranquilla debe ser un número válido.',
                    
                    'combarranquilla_saldo.nullable'=> 'Asegúrate de que sea un número válido.',
                    'combarranquilla_saldo.numeric' => 'Asegúrate de que no contenga caracteres no numéricos.',
                    
                    'otros_mensual.nullable'        => 'Asegúrate de que sean números válidos.',
                    'otros_mensual.numeric'         => 'Asegúrate de que no contengan caracteres no numéricos.',
                    
                    'otros_saldo.nullable'          => 'Asegúrate de que sean números válidos.',
                    'otros_saldo.numeric'           => 'Asegúrate de que no contengan caracteres no numéricos.',
                ]);
                // Agregar el ID del prestamo al arrya de datos validados
                $validated['prestamos_request_id'] = $id; 
                // dd($request->all());
                // modelo para ingresar el nuevo registro a la tabla de la DB
                PrestamosAdmin::create($validated);
                // redirigir al listado de peticiones con mensaje de éxito
                return redirect()->route('formulario.index')->with('success', 'Respuesta enviada correctamente');
            } else {
                return redirect()->back()->with('error', 'Ruta no válida');
            }
        } catch (ValidationException $e) {
            // Redirigir a la ruta correspondiente según el formulario
            if ($routeName === 'form.submit') {
                return redirect()->route('form.show')
                ->with ('error', 'Se han ingresado datos inválidos')
                ->withErrors($e->errors())
                ->withInput();
            } elseif ($routeName === 'form.submit.admin' && $id !== null) {
                // dd($e->errors());
                return redirect()->route('form.admin', ['id' => $id])
                ->with('error', 'Se han ingresado datos inválidos')
                ->withErrors($e->errors())
                ->withInput();
            } else {
                return redirect()->route('form.show')
                ->with('error', 'Se han ingresado datos inválidos 2')
                ->withErrors($e->errors())
                ->withInput();
            }
            
        } catch (\Throwable $e) {
            // dd($routeName, $id);
            // dd($e);
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