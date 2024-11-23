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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('reserva_id'); // Clave primaria autoincremental
            $table->unsignedBigInteger('salon_id'); // Llave foránea
            $table->date('fecha_reserva'); // Fecha de la reserva
            $table->integer('duracion'); // Duración en horas
            $table->string('nombre_alumno'); // Nombre del alumno
            $table->string('codigo_alumno'); // Código del alumno
            $table->timestamps(); // Campos created_at y updated_at

            // Definición de la relación con la tabla salones
            $table->foreign('salon_id')->references('salon_id')->on('salones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
