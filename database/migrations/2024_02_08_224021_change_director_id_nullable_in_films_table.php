<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('films', function (Blueprint $table) {
        $table->unsignedBigInteger('director_id')->nullable()->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('films', function (Blueprint $table) {
        // Вернуть ограничение NOT NULL, если это необходимо
        $table->unsignedBigInteger('director_id')->nullable(false)->change();
    });
}

};
