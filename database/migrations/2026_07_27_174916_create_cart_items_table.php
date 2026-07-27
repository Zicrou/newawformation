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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuid('cours_id');
            $table->foreign('cours_id')
            ->references('id')
            ->on('cours')
            ->onDelete('cascade');
            $table->uuid('cart_id');
            $table->foreign('cart_id')
            ->references('id')
            ->on('carts')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
