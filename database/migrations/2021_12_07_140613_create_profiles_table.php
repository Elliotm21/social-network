<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->bool('admin'); bool doesn't exist
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
