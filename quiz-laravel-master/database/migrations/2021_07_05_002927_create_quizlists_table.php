<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->integer('role')->default(1)->comment('0=mainlist, 1=normal');
            $table->integer('is_public')->default(1)->comment('0=private,1=public');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizlists');
    }
}
