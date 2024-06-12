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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->unsignedInteger('user_id')->autoIncrement();
            $table->string('image_url', 255);
            $table->string('email')->unique();
            $table->string('password', 128);
            $table->string('username', 25);
            $table->enum('role', ['user', 'admin'])->default('user');
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
