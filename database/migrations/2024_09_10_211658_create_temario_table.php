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
        Schema::create('temarios', function (Blueprint $table) {
            $table->id();
            $table->text('nombre')->nullable();
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('listado_id')->unsigned()->index();
            $table->foreign('listado_id')->references('id')->on('cursolistados')->onDelete('cascade');
            
            $table->text("file")->nullable();
            $table->string('temario')->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temarios');
    }
};
