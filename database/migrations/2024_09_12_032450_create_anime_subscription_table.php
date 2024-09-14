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
        Schema::create('anime_subscription', function (Blueprint $table) {
            $table->foreignId('anime_id')->constrained();
            $table->foreignId('subscription_id')->constrained('subscriptions');
            $table->primary(['anime_id','subscription_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_subscription');
    }
};
