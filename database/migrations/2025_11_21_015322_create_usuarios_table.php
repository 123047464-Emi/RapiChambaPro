<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->dateTime('fechaInscripcion')->nullable();
            $table->string('contrasena');
            $table->foreignId('idEstatus')->constrained('estatus')->cascadeOnDelete();
            $table->foreignId('idUbicacion')->constrained('direcciones')->cascadeOnDelete();
            $table->string('fotografia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};