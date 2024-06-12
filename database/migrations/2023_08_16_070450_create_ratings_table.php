<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('anime_id');
            $table->primary(['user_id', 'anime_id']);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('anime_id')->references('anime_id')->on('animes')->onDelete('cascade');
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }

};
