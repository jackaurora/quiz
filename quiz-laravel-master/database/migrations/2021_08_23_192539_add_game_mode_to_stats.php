<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGameModeToStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stats', function (Blueprint $table) {
            //
            $table->tinyInteger('quiz_mode')->unsigned()->default(0)->after('translation_id')->comment('0=translation, 1=smallsmartkeyboard, 2=oneoffour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stats', function (Blueprint $table) {
            //
            $table->dropColumn('quiz_mode');
        });
    }
}
