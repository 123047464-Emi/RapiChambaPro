<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empleado_habilidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEmpleado')->constrained('empleados')->cascadeOnDelete();
            $table->foreignId('idHabilidad')->constrained('habilidades')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleado_habilidad');
    }
};
