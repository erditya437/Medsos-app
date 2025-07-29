<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('chats', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('from_user_id');
        $table->unsignedBigInteger('to_user_id');
        $table->text('message')->nullable();
        $table->string('media')->nullable(); // untuk foto/video
        $table->enum('media_type', ['image', 'video', 'none'])->default('none');
        $table->timestamps();

        $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
