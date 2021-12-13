<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('likes', function (Blueprint $table)
        {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->
                on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('post_id')->references('id')->
                on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}