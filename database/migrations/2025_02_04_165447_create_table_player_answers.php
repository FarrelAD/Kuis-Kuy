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
        Schema::create('player_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('question_id');

            $table->primary(['player_id', 'question_id']);

            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('selected_answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_answers');
    }
};
