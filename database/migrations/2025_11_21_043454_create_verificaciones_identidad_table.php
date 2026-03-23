<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verificaciones_identidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IdUsuario');
            $table->string('Documento');
            $table->unsignedBigInteger('IdEstatus');
            $table->dateTime('FechaSolicitud');
            $table->dateTime('FechaVerificacion')->nullable();
            $table->timestamps();

            $table->foreign('IdUsuario')->references('id')->on('usuarios');
            $table->foreign('IdEstatus')->references('id')->on('estatus');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verificaciones_identidad');
    }
};