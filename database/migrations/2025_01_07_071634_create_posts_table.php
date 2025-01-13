<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id();
            $table->string('title')->unique();
            $table->text('excerpt')->nullable();
            $table->text('body');
            $table->integer('min_to_read')->default(1);
            $table->boolean('is_published');
            $table->string('image_url');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
