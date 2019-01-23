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
            $table->string('picture')->default('default.png');
            $table->string('sound')->default('default.mp3');
            $table->string('spelling')->nullable();
            $table->string('translate')->nullable();
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
