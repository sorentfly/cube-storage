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
        Schema::create('cubes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('box_id');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
            
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cubes');
    }
};
