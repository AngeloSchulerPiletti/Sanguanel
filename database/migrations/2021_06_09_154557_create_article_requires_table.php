<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleRequiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_requires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyText('author');
            $table->string('subject', 50); 
            $table->mediumText('description');
            $table->tinyText('title');
            $table->longText('text');
            $table->longText('text_formatted');
            $table->string('keywords')->default('');
            $table->tinyText('path_dirPictures')->default('');
            $table->tinyText('pictureNames')->default('');
            $table->string('url');
            $table->string('status')->default('open');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_requires');
    }
}
