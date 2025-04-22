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
        Schema::create('cursolistados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('cursocategorias_id')->unsigned()->index();
            $table->foreign('cursocategorias_id')->references('id')->on('cursocategorias')->onDelete('cascade');

            $table->text("file")->nullable();
            $table->text("video")->nullable();
            $table->text("portada")->nullable();
            $table->string('meses')->nullable();
            $table->string('sesiones')->nullable();

            $table->unsignedBigInteger('profesor_id')->unsigned()->index();
            $table->foreign('profesor_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursolistados');
    }
};
