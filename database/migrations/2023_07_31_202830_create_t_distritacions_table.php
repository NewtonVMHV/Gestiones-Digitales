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
        Schema::create('t_distritacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Acuerdo',35);
            $table->date('Fecha');
            $table->string('Observaciones',120)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_distritacions');
    }
};
