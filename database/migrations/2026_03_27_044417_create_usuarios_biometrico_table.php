<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios_biometrico', function (Blueprint $table) {
            $table->id(); // int id
            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete(); // relación con usuarios
            $table->longText('foto'); // campo longtext para foto
            $table->longText('vector'); // campo longtext para vector biométrico
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios_biometrico');
    }
};
