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
        Schema::create('radicals', function (Blueprint $table) {
            $table->id();
            $table->string('character');
            $table->string('meaning');
            $table->string('reading');
            $table->string('image')->nullable();
            $table->string('kanjis')->nullable();
            $table->unsignedTinyInteger('strokes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radicals');
    }
};
