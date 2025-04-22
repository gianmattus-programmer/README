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
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->text('nombre')->nullable();
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('encuentranos_id')->unsigned()->index();
            $table->foreign('encuentranos_id')->references('id')->on('encuentranos')->onDelete('cascade');
            
            $table->text('enlace')->nullable();
            $table->text("file")->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
