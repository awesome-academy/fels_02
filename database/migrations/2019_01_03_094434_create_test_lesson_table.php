<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_lesson', function (Blueprint $table) {
            $table->increments('exam_id');
            $table->string('exam_name');
            $table->integer('user_id');
            $table->integer('lesson_id');
            $table->integer('sum_correct_answer');
            $table->tinyInteger('status');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_lesson');
    }
}
