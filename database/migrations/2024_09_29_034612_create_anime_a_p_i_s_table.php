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
        Schema::create('anime_apis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_kana')->nullable();
            $table->string('title_en')->nullable();
            $table->string('media')->nullable();
            $table->string('media_text')->nullable();
            $table->date('released_on')->nullable();
            $table->integer('released_on_about')->nullable();
            $table->text('official_site_url')->nullable();
            $table->text('wikipedia_url')->nullable();
            $table->text('twitter_username')->nullable();
            $table->text('twitter_hashtag')->nullable();
            $table->text('syobocal_tid')->nullable();
            $table->integer('episodes_count')->nullable();
            $table->integer('watchers_count')->nullable();
            $table->integer('reviews_count')->nullable();
            $table->boolean('no_episodes')->nullable();
            $table->text('season_name')->nullable();
            $table->text('season_name_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_apis');
    }
};
