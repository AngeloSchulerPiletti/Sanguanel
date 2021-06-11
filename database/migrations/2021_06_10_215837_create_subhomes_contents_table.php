<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubhomesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subhomes_contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('description');
            $table->string('subject'); // historia | curiosidades | producao | comidas | drinks 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subhomes_contents');
    }
}
