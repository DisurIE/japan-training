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
        Schema::create('kanji_radical', function (Blueprint $table) {
            $table->unsignedBigInteger('kanji_id');
            $table->unsignedBigInteger('radical_id');

            $table->index('kanji_id', 'kanji_radical_kanji_idx');
            $table->index('radical_id', 'kanji_radical_radical_idx');

            $table->foreign('kanji_id', 'kanji_radical_kanji_fk')->on('kanjis')->references('id');
            $table->foreign('radical_id', 'kanji_radical_radical_fk')->on('radicals')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanji_radicals');
    }
};
