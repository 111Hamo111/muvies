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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('surename');
            $table->smallInteger('age');
            $table->text('image_path');
            
            $table->unsignedBigInteger('country_id');
            $table->index('country_id', 'actor_country_idx');
            $table->foreign('country_id', 'actor_country_fk')->on('countries')->references('id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
