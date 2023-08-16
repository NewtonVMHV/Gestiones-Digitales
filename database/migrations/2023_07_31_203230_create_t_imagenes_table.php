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
        Schema::create('t_imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Curp',18);
            $table->string('Nombres',150);
            $table->string('Apellidos',150);
            $table->string('fotografia')->nullable();
            $table->string('inef')->nullable();
            $table->string('inea')->nullable();
            $table->string('domicilio',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_imagenes');
    }
};
