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
        Schema::create('ingreso_salida_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_ingreso');
            $table->date('fecha_in_ingreso');
            $table->date('fecha_fin_salida');
            $table->time('hora');
            $table->text('descripcionElemento');
            $table->text('descripcionElemento2');
            $table->text('descripcionElemento3');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idElemento')->nullable();
            $table->unsignedBigInteger('idElemento2')->nullable();
            $table->unsignedBigInteger('idElemento3')->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idElemento')->references('id')->on('elementos');
            $table->foreign('idElemento2')->references('id')->on('elementos');
            $table->foreign('idElemento3')->references('id')->on('elementos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_salida_equipos');
    }
};
