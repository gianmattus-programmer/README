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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('ape_pat')->nullable();
            $table->string('ape_mat')->nullable();
            $table->string('reclamo')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('tip_doc')->nullable();
            $table->string('num_doc')->nullable();
            $table->string('email')->nullable();
            $table->string('bien')->nullable();
            $table->string('tip_mon')->nullable();
            $table->string('monto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('motivo')->nullable();
            $table->text('detalles')->nullable();
            $table->text('pedido')->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
