<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->char('identifier', 1); // A, B, C, D
            $table->text('content'); // Text or image URL
            $table->enum('content_type', ['text', 'image']);
            $table->timestamps();
            $table->unique(['question_id', 'identifier']); // Ensure each question has unique choice identifiers (A-D)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
