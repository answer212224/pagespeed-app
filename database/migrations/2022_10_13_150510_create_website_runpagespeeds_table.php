<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteRunpagespeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_runpagespeeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_id')->constrained()->onDelete('cascade');

            $table->json('loading_experience')->nullable();

            $table->json('first_contentful_paint')->nullable();
            $table->json('speed_index')->nullable();
            $table->json('total_blocking_time')->nullable();
            $table->json('largest_contentful_paint')->nullable();
            $table->json('cumulative_layout_shift')->nullable();
            $table->json('interactive')->nullable();

            $table->integer('performance_score');

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
        Schema::dropIfExists('website_runpagespeeds');
    }
}
