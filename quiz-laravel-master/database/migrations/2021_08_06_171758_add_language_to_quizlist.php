<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageToQuizlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizlists', function (Blueprint $table) {
            //
            $table->bigInteger('language_1')->unsigned()->default(43)->after('user_id');
            $table->bigInteger('language_2')->unsigned()->default(43)->after('language_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizlists', function (Blueprint $table) {
            //
            $table->dropColumn('language_1');
            $table->dropColumn('language_2');
        });
    }
}
