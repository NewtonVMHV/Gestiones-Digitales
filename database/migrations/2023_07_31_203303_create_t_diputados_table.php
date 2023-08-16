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
        Schema::create('t_diputados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Legislatura',45);
            $table->string('NombreDl',25);
            $table->string('ApellidoDl',25);
            $table->string('Distrito',50);
            $table->tinyInteger('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_diputados');
    }
};
