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
        Schema::create('anime_cast', function (Blueprint $table) {
            $table->foreignId('anime_id')->constrained('animes');
            $table->foreignId('cast_id')->constrained('casts');
            $table->primary(['anime_id','cast_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_cast');
    }
};
