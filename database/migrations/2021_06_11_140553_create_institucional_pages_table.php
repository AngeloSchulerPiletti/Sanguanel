<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionalPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucional_pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject');
            $table->tinyText('description');
            $table->longText('text_formatted');
            $table->longText('text');
            $table->tinyText('path_dirPictures')->default('');
            $table->tinyText('pictureNames')->default('');
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
        Schema::dropIfExists('institucional_pages');
    }
}
