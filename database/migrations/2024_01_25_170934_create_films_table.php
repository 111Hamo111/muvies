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
        Schema::create('films', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('image_path');
            $table->text('video_path');
            $table->text('trailer_path');
            $table->text('content');
            $table->smallInteger('time');
            
            $table->unsignedBigInteger('operator_id');
            $table->index('operator_id', 'film_operator_idx');
            $table->foreign('operator_id', 'film_operator_fk')->on('operators')->references('id');

            $table->unsignedBigInteger('director_id');
            $table->index('director_id', 'film_director_idx');
            $table->foreign('director_id', 'film_director_fk')->on('directors')->references('id');

            $table->unsignedBigInteger('year_id');
            $table->index('year_id', 'film_year_idx');
            $table->foreign('year_id', 'film_year_fk')->on('years')->references('id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
