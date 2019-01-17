<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_detail', function (Blueprint $table) {
            $table->increments('word_id');
            $table->string('word_name');
            $table->string('picture')->default('default.jpeg');;
            $table->string('sound');
            $table->string('translate');
            $table->integer('lesson_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_detail');
    }
}
