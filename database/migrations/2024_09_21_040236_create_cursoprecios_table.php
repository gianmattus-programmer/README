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
        Schema::create('cursoprecios', function (Blueprint $table) {
            $table->id();
            $table->string('precio')->nullable();
            $table->string('descuento')->nullable();

            $table->unsignedBigInteger('listado_id')->unsigned()->index();
            $table->foreign('listado_id')->references('id')->on('cursolistados')->onDelete('cascade');

            $table->string('inicio')->nullable();
            $table->string('duracion')->nullable();
            $table->string('horarios')->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursoprecios');
    }
};
