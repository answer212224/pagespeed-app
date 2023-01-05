<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStrategyColumnToWebsiteRunpagespeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('website_runpagespeeds', function (Blueprint $table) {
            $table->string('strategy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('website_runpagespeeds', function (Blueprint $table) {
            $table->dropColumn('strategy');
        });
    }
}
