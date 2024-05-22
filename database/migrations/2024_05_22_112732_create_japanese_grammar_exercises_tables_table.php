<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('japanese_grammar_exercises', function (Blueprint $table) {
            $table->id();
            $table->text('exercise_text'); // текст упражнения с пропусками
            $table->text('correct_answer'); // правильный ответ
            $table->enum('level', ['N1', 'N2', 'N3', 'N4', 'N5']); // уровень
            $table->timestamps();
        });

        Schema::create('japanese_grammar_exercise_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id');
            $table->text('option_text'); // текст варианта ответа
            $table->timestamps();

            $table->foreign('exercise_id')->references('id')->on('japanese_grammar_exercises')->onDelete('cascade');
        });
    }

        public function down()
    {
        Schema::dropIfExists('japanese_grammar_exercise_options');
        Schema::dropIfExists('japanese_grammar_exercises');
    }
};
