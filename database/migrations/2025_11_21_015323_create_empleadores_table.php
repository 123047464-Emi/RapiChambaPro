<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empleadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('idUsuario')->constrained('usuarios')->cascadeOnDelete();
            $table->text('descripcion')->nullable();
            $table->integer('numTareas')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleadores');
    }
};