<?php

use App\Models\Enums\ExerciseLevels;
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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->text('answer');
            $table->enum('level', ExerciseLevels::values());
            $table->timestamps();
        });

        Schema::create('exercise_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id');
            $table->text('text');
            $table->timestamps();

            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

        public function down()
    {
        Schema::dropIfExists('exercise_options');
        Schema::dropIfExists('exercises');
    }
};
