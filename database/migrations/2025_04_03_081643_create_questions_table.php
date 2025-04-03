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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('category'); // 1-5

            // Question content (text or image)
            $table->text('question_text')->nullable();
            $table->string('question_image')->nullable();

            // Choices (text and image for each)
            $table->string('choice_a_text')->nullable();
            $table->string('choice_a_image')->nullable();

            $table->string('choice_b_text')->nullable();
            $table->string('choice_b_image')->nullable();

            $table->string('choice_c_text')->nullable();
            $table->string('choice_c_image')->nullable();

            $table->string('choice_d_text')->nullable();
            $table->string('choice_d_image')->nullable();

            $table->enum('correct_answer', ['A', 'B', 'C', 'D']);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
