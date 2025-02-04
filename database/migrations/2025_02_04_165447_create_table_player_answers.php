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
            $table->unsignedBigInteger('id_player');
            $table->unsignedBigInteger('id_question');

            $table->string('selected_answer');

            $table->primary(['id_player', 'id_question']);

            $table->foreign('id_player')
                ->references('id_player')
                ->on('players')
                ->onDelete('cascade');
            $table->foreign('id_question')
                ->references('id_question')
                ->on('questions')
                ->onDelete('cascade');
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
