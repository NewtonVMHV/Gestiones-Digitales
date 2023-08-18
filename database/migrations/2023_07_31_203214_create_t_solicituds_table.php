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
        Schema::create('t_solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->date('FechaSol');
            $table->string('Solicitud',254);
            $table->string('Observaciones',254)->nullable();
            $table->string('address');
            $table->string('latitude', 15);
            $table->string('longitude', 15);
            $table->tinyInteger('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_solicituds');
    }
};
