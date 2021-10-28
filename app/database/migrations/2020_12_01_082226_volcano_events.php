<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VolcanoEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volcano_events', function (Blueprint $table) {
            $table->id();
            
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();

            $table->integer('earthquakeEventId')->nullable();
            $table->integer('tsunamiEventId')->nullable();
            $table->integer('volcanoLocationId')->nullable();

            $table->string('damageAmountOrder')->nullable();
            $table->string('damageMillionsDollars')->nullable();
   
            $table->string('deathsAmountOrder')->nullable();

            $table->string('housesDestroyed')->nullable();
            $table->string('housesDestroyedAmountOrder')->nullable();

            $table->string('injuries')->nullable();
            $table->string('injuriesAmountOrder')->nullable();
            $table->string('injuriesTotal')->nullable();
 
            $table->string('vei')->nullable();

            $table->string('missing')->nullable();
            $table->string('missingAmountOrder')->nullable();

            $table->string('deaths')->nullable();

            $table->string('startDate')->nullable();
            $table->string('endDate')->nullable();

            $table->mediumText('comments')->nullable();

            $table->timestamps();

            $table->foreign('earthquakeEventId')->references('id')->on('earthquake_events');
            $table->foreign('tsunamiEventId')->references('id')->on('tsunami_events');
            $table->foreign('volcanoLocationId')->references('id')->on('volcanoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('volcano_events');
    }
}
