<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestamos_request_id')->constrained('prestamos');
            $table->string('balance');
            $table->string('maturity');
            $table->string('payments');
            $table->date('entrydate');
            $table->string('salary');
            $table->date('date');
            $table->string('responsible_report');
            // RECORDAR VALIDAR EN EL CONTROLADOR QUE LA OPCIÓN SELECCIONADA SE CONVIERTA EN TRUE O FALSE RESPECTIVAMENTE 
            $table->string('payment_status');

            $table->string('signature');
            $table->string('approved_amount');
            $table->string('payment_frequency');
            $table->date('from');
            $table->string('new_discounts');

            // campos para las libranzas
            $table->decimal('comfenalco_mensual', 10, 2)->nullable();
            $table->decimal('comfenalco_saldo', 10, 2)->nullable();
            $table->decimal('combarranquilla_mensual', 10, 2)->nullable();
            $table->decimal('combarranquilla_saldo', 10, 2)->nullable();
            $table->decimal('otros_mensual', 10, 2)->nullable();
            $table->decimal('otros_saldo', 10, 2)->nullable();

            $table->string('input_approved');
            $table->string('date_approved');

            $table->timestamps(); // Agregar timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos_admins');
    }
};
