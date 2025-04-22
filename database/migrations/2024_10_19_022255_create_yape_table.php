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
        Schema::create('yapes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('checkout_id')->unsigned()->index();
            $table->foreign('checkout_id')->references('id')->on('checkouts')->onDelete('cascade');
            $table->text('file')->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yapes');
    }
};
