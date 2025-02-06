<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzez', function (Blueprint $table) {
            $table->id('id_quiz');
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')
                ->references('id_instructor')
                ->on('instructors');
            $table->string('name');
            $table->integer('total_question');
            $table->timestamp('date_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzez');
    }
};
