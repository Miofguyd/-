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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('picture')->nullable();
            $table->string('director');
            $table->string('original_work');
            $table->integer('star_total')->nullable();
            $table->integer('review_total')->nullable();
            $table->foreignId('review_id')->constrained('reviews');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
