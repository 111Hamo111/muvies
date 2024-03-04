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
        // Разрешаем NULL значения для столбца operator_id
        $table->unsignedBigInteger('operator_id')->nullable()->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('films', function (Blueprint $table) {
        // Вернуть ограничение NOT NULL, если это необходимо
        $table->unsignedBigInteger('operator_id')->nullable(false)->change();
    });
}

};
