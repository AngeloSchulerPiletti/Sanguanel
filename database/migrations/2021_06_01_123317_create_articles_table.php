<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyText('author');
            $table->string('subject', 50); 
            $table->mediumText('description');
            $table->tinyText('title');
            $table->longText('text');
            $table->string('keywords')->default('');
            $table->tinyText('path_dirPictures')->default('');
            $table->string('pictureNames')->default('');
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
