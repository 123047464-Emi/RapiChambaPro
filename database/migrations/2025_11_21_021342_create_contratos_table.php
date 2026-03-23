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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('FechaInicio'); 
            $table->dateTime('FechaFin');
            $table->foreignId('idEstatus')->constrained('estatus')->cascadeOnDelete();
            $table->foreignId('idTarea')->constrained('tareas')->cascadeOnDelete(); 
            $table->foreignId('idEmpleado')->constrained('empleados')->cascadeOnDelete();
            $table->foreignId('idTipo')->constrained('tiposcontratos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
