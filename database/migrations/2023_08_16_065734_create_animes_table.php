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
        Schema::create('animes', function (Blueprint $table) {
            // $table->id();
            $table->unsignedInteger('anime_id')->autoIncrement();
            $table->string('image_url', 255);
            $table->string('title', 100);
            $table->text('description');
            $table->date('aired_date');
            $table->boolean('is_ongoing');
            $table->integer('episodes');
            $table->decimal('rating', 3, 2)->default(0.00);
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
        Schema::dropIfExists('animes');
    }
};
