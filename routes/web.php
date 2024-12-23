<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo  de rutas protegias por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para crud de texto
    Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
    Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create');
    Route::post('/texts', [TextController::class, 'store'])->name('texts.store');

    // ruta pdf
    Route::get('/formulario', [PdfController::class, 'index'])->name('formulario.index');
    Route::get('/formulario/show', [PdfController::class, 'showForm'])->name('form.show'); // Muestra el formulario
    Route::post('/formulario/submit', [PdfController::class, 'submitForm'])->name('form.submit'); // Procesa los datos del formulario
    Route::get('/pdf/{id}', [PdfController::class, 'pdf'])->name('pdf.pdf');
    // Route::get('/pdf2/{id}', [PdfController::class, 'show'])->name('pdf.pdf');
    
});

// Requiere las ruts de autenticación
require __DIR__.'/auth.php';
