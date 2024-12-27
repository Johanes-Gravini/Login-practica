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
                    'maturity'  => 'required|string|max:255',
                    'payments'  => 'required|numeric',
                    'entrydate' => 'required|date',
                    'salary'    => 'required|numeric',
                    'date'      => 'required|date',
                    'responsible_report'    => 'required|string|max:255',
                    'payment_status'        => 'required|in:approved,no-aprovend',
                    'signature'             => 'required|string|max:255',
                    'approved_amount'       => 'required|numeric',
                    'payment_frequency'     => 'required|in:quincenales,mensuales',
                    'from'                  => 'required|date',
                    'new_discounts'         => 'nullable|string|max:255',
                    'input_approved'        => 'required|string|max:255',
                    'date_approved'         => 'required|date',
                    // Validaciones para las libranzas
                    'comfenalco_mensual'        => 'nullable|numeric',
                    'comfenalco_saldo'          => 'nullable|numeric',
                    'combarranquilla_mensual'   => 'nullable|numeric',
                    'combarranquilla_saldo'     => 'nullable|numeric',
                    'otros_mensual'             => 'nullable|numeric',
                    'otros_saldo'               => 'nullable|numeric',
                ], [
                    'balance.required'              => 'El balance es obligatorio.',
                    'maturity.required'             => 'El vencimiento es obligatorio.',
                    'payments.required'             => 'Los pagos son obligatorios.',
                    'entrydate.required'            => 'La fecha de entrada es obligatoria.',
                    'salary.required'               => 'El salario es obligatorio.',
                    'date.required'                 => 'La fecha es obligatoria.',
                    'responsible_report.required'   => 'El responsable del informe es obligatorio.',
                    'payment_status.required'       => 'El estado del pago es obligatorio.',
                    'signature.required'            => 'La firma es obligatoria.',
                    'approved_amount.required'      => 'El monto aprobado es obligatorio.',
                    'payment_frequency.required'    => 'La frecuencia de pago es obligatoria.',
                    'from.required'                 => 'La fecha de inicio es obligatoria.',
                    'input_approved.required'       => 'El campo de entrada aprobado es obligatorio.',
                    'date_approved.required'        => 'La fecha de aprobación es obligatoria.',
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