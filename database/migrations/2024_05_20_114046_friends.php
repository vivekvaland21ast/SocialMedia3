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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('profiles')->onDelete('cascade');

            // Ensure each friendship combination is unique
            $table->unique(['user_id', 'friend_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
