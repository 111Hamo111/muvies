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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('rating');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'rating_user_idx');
            $table->foreign('user_id', 'rating_user_fk')->on('users')->references('id');

            $table->unsignedBigInteger('film_id');
            $table->index('film_id', 'rating_film_idx');
            $table->foreign('film_id', 'rating_film_fk')->on('films')->references('id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
