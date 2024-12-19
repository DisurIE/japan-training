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
        Schema::create('exercises_users_progress', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->timestamps();

            $table->index('exercise_id', 'exercise_user_exercise_idx');
            $table->index('user_id', 'exercise_user_user_idx');

            $table->foreign('exercise_id', 'user_exercise_exercise_fk')->on('exercises')->references('id');
            $table->foreign('user_id', 'user_exercise_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises_users_progress');
    }
};
