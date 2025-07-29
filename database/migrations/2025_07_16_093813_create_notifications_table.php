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
       Schema::create('notifications', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // yang menerima notifikasi
    $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade'); // yang mengirim notifikasi
    $table->string('type'); // like, comment, reply, follow_request, follow_accept, etc
    $table->text('message')->nullable(); // teks custom
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
