<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject'); // institucional | artigos | receitas
            $table->tinyText('description')->default('');
            $table->longText('text');
            $table->longText('text_formatted');
            $table->tinyText('path_dirPictures')->default('');
            $table->tinyText('pictureNames')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepages');
    }
}
