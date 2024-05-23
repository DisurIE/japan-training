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
        Schema::create('japanese_grammar_exercises_users_progress', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('japanese_grammar_exercise_id');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->timestamps();

            $table->index('japanese_grammar_exercise_id', 'japanese_grammar_exercise_user_japanese_grammar_exercise_idx');
            $table->index('user_id', 'japanese_grammar_exercise_user_user_idx');

            $table->foreign('japanese_grammar_exercise_id', 'user_japanese_grammar_exercise_japanese_grammar_exercise_fk')->on('japanese_grammar_exercises')->references('id');
            $table->foreign('user_id', 'user_japanese_grammar_exercise_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('japanese_grammar_exercises_users_progress');
    }
};
