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
        Schema::create('cursomodulos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->longText('informacion')->nullable();

            $table->unsignedBigInteger('temario_id')->unsigned()->index();
            $table->foreign('temario_id')->references('id')->on('temarios')->onDelete('cascade');
            
            $table->string('examen')->nullable();
            $table->integer('ordermod')->default(0);
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursomodulos');
    }
};
