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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('checkout_id')->unsigned()->index();
            $table->foreign('checkout_id')->references('id')->on('checkouts')->onDelete('cascade');

            $table->unsignedBigInteger('cursocategorias_id')->unsigned()->index();
            $table->foreign('cursocategorias_id')->references('id')->on('cursocategorias')->onDelete('cascade');

            $table->unsignedBigInteger('listado_id')->unsigned()->index();
            $table->foreign('listado_id')->references('id')->on('cursolistados')->onDelete('cascade');
            
            $table->unsignedBigInteger('precio_id')->unsigned()->index();
            $table->foreign('precio_id')->references('id')->on('cursoprecios')->onDelete('cascade');

            $table->string('nombre')->nullable();
            $table->string('categoria')->nullable();
            $table->string('precio')->nullable();
            $table->string('descuento')->nullable();
            $table->string('cantidad')->nullable();
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
        Schema::dropIfExists('detalles');
    }
};
