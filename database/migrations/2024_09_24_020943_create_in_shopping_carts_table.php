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
        Schema::create('in_shopping_carts', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('listado_id')->unsigned()->index();
            $table->foreign('listado_id')->references('id')->on('cursolistados')->onDelete('cascade');
            
            $table->unsignedBigInteger('precio_id')->unsigned()->index();
            $table->foreign('precio_id')->references('id')->on('cursoprecios')->onDelete('cascade');

            $table->unsignedBigInteger('shopping_cart_id')->unsigned()->index();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade');

            $table->string("cantidad")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_shopping_carts');
    }
};
