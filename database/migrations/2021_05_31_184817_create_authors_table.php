<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyText('profile');
            $table->mediumText('bio');

            $table->string('title1', 50);
            $table->longText('text1');
            $table->tinyText('picture1')->default("");

            $table->string('title2', 50)->default("");
            $table->longText('text2')->default("");
            $table->tinyText('picture2')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
