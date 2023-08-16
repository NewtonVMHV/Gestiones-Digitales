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
        Schema::create('t_secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Seccion',5);
            $table->string('Distrito',50);
            $table->string('Municipio',16);
            $table->string('Distritacion',50);
            $table->tinyInteger('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_secciones');
    }
};
