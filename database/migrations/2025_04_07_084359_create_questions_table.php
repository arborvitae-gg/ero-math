<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category')->unsigned(); // 1-5
            $table->text('content'); // Text or image URL
            $table->enum('content_type', ['text', 'image']);
            $table->char('correct_answer', 1); // A, B, C, D
            $table->foreignId('created_by')->constrained('users'); // Admin ID
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
