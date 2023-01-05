<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagespeedInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagespeed_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_id')->constrained()->onDelete('cascade');
            $table->bigInteger('LCP_percentile');
            $table->string('LCP_category');

            $table->bigInteger('FID_percentile');
            $table->string('FID_category');

            $table->bigInteger('CLS_percentile');
            $table->string('CLS_category');

            $table->bigInteger('FCP_percentile');
            $table->string('FCP_category');

            $table->bigInteger('INP_percentile');
            $table->string('INP_category');

            $table->bigInteger('TTFB_percentile');
            $table->string('TTFB_category');

            $table->string('overall_category');
            $table->string('strategy');
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
        Schema::dropIfExists('pagespeed_insights');
    }
}
