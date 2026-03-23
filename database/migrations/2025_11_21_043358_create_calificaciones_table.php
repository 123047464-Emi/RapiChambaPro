<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IdEmpleado');
            $table->unsignedBigInteger('IdEmpleador');
            $table->integer('Puntuacion');
            $table->date('FechaCalificacion');
            $table->text('Comentarios')->nullable();
            $table->unsignedBigInteger('IdTarea');
            $table->timestamps();

            $table->foreign('IdEmpleado')->references('id')->on('empleados');
            $table->foreign('IdEmpleador')->references('id')->on('empleadores');
            $table->foreign('IdTarea')->references('id')->on('tareas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};