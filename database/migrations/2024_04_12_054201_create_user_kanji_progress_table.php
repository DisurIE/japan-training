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
        Schema::create('user_kanji_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kanji_id');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->timestamps();

            $table->index('kanji_id', 'kanji_user_kanji_idx');
            $table->index('user_id', 'kanji_user_user_idx');

            $table->foreign('kanji_id', 'user_kanji_kanji_fk')->on('kanjis')->references('id');
            $table->foreign('user_id', 'user_kanji_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kanji_progress');
    }
};
