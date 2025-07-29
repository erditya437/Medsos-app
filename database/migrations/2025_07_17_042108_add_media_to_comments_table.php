<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->string('media')->nullable();
        $table->string('media_type')->nullable();
    });
}

public function down()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->dropColumn(['media', 'media_type']);
    });
}

};
