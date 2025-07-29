<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('follows', function (Blueprint $table) {
        $table->enum('status', ['pending', 'accepted'])->default('pending');
    });
}

public function down()
{
    Schema::table('follows', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
