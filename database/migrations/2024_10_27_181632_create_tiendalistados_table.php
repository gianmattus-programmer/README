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
        Schema::create('tiendalistados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('tiendacategoria_id')->unsigned()->index();
            $table->foreign('tiendacategoria_id')->references('id')->on('tiendacategorias')->onDelete('cascade');

            $table->text("file")->nullable();
            $table->longText("informacion")->nullable();
            $table->string("precio")->nullable();
            $table->string('descuento')->nullable();
            $table->string('estado')->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendalistados');
    }
};
