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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Para usuarios registrados
            $table->string('session_id')->nullable();          // Para usuarios no registrados
            $table->unsignedBigInteger('product_id');          // Producto añadido al carrito
            $table->integer('quantity')->default(1);   
            $table->string('categoria')->nullable();
            $table->string('categoria_id')->nullable(); 
            $table->string('precio')->nullable();
            $table->string('descuento')->nullable();
            $table->string('precio_id')->nullable();        // Cantidad de productos
        
            // Solo necesitas esto para created_at y updated_at
            $table->timestamps();                              // Crea automáticamente 'created_at' y 'updated_at'
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('cursolistados')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
