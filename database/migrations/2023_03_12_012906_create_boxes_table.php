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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(true);
            
            $table->unsignedBigInteger('shelf_id');
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
