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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->nullable();
            $table->string('room_title')->nullable();
            $table->string('room_type')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('facilities')->nullable();
            $table->integer('price')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
