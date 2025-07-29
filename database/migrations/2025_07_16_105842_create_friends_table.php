<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/xxxx_xx_xx_create_friends_table.php
public function up()
{
    Schema::create('friends', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('friend_id');
        $table->timestamps();

        $table->unique(['user_id', 'friend_id']);

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
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
