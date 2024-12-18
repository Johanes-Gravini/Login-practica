<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('prestamos', function(Blueprint $table){
            $table->id();
            $table->string('options');
            $table->string('name');
            $table->string('cc', 10);
            $table->decimal('value');
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('purpose');
            $table->string('employee');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
