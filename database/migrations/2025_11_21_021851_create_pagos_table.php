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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto final', 10, 2);
            $table->dateTime('fechaPago')->nullable();
            $table->foreignId('idMetodo')->constrained('metodospagos')->cascadeOnDelete();
            $table->foreignId('idEstatus')->constrained('estatus')->cascadeOnDelete();
            $table->foreignId('idContrato')->constrained('contratos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
