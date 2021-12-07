<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->id();
            $table->string('text');
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->
                on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('post_id')->references('id')->
                on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}