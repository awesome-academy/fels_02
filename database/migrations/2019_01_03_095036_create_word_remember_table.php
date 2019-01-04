<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordRememberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_remember', function (Blueprint $table) {
            $table->increments('word_remember_id');
            $table->integer('user_id');
            $table->integer('word_id');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('follow')->default(0);
            $table->timestamp('date_learned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_remember');
    }
}
