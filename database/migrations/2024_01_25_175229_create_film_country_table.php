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
        Schema::create('film_country', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('film_id');
            $table->index('film_id', 'film_country_film_idx');
            $table->foreign('film_id', 'film_country_film_fk')->on('films')->references('id');

            $table->unsignedBigInteger('country_id');
            $table->index('country_id', 'film_country_country_idx');
            $table->foreign('country_id', 'film_country_country_fk')->on('countries')->references('id');       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_country');
    }
};
