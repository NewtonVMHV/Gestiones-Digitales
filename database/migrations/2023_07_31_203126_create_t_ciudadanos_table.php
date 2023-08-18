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
        Schema::create('t_ciudadanos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Curp',19);
            $table->string('Nombres',25);
            $table->string('Apellidos', 25);
            $table->string('fotografia')->nullable();
            $table->string('inef')->nullable();
            $table->string('inea')->nullable();
            $table->string('Direccion',45);
            $table->string('Colonia',45);
            $table->string('Seccion',5);
            $table->string('Municipio',16);
            $table->string('Celular', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_ciudadnos');
    }
};
