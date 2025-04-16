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
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('category')->unsigned(); // 1-5 (matches question category)
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable(); // Nullable for auto-submit on timeout
            $table->integer('score')->default(0);
            $table->integer('tab_switch_count')->default(0); // Track tab switches
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
