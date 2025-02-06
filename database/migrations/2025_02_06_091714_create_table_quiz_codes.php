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
        Schema::create('quiz_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->timestamp('expired_at');
            $table->integer('game_duration');
            $table->unsignedBigInteger('id_quiz');
            $table->foreign('id_quiz')
                ->references('id_quiz')
                ->on('quizzez')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_codes');
    }
};
