<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TsunamiEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsunami_events', function (Blueprint $table) {
            $table->id();
            
            $table->string('locationName')->nullable();
            $table->string('country')->nullable();
            
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('minute')->nullable();
            $table->integer('second')->nullable();

            $table->integer('regionCode')->nullable();
            $table->integer('causeCode')->nullable();
            $table->integer('eventValidity')->nullable();

            $table->integer('earthquakeEventId')->nullable();
            $table->integer('volcanoLocationId')->nullable();
            $table->integer('volcanoEventId')->nullable();

            $table->integer('damageAmountOrder')->nullable();
            $table->integer('damageMillionsDollars')->nullable();
   
            $table->integer('deathsAmountOrder')->nullable();

            $table->string('housesDestroyed')->nullable();
            $table->integer('housesDestroyedAmountOrder')->nullable();

            $table->string('housesDamaged')->nullable();
            $table->integer('housesDamagedAmountOrder')->nullable();


            $table->string('injuries')->nullable();
            $table->integer('injuriesAmountOrder')->nullable();

            $table->float('maxWaterHeight')->nullable();
       
            $table->string('tsMtAbe')->nullable();
            
            $table->string('area')->nullable();

            $table->string('missing')->nullable();
            $table->string('missingAmountOrder')->nullable();

            $table->string('deaths')->nullable();

            $table->mediumText('comments')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->timestamps();

            $table->foreign('earthquakeEventId')->references('id')->on('earthquake_events');
            $table->foreign('volcanoEventId')->references('id')->on('volcano_events');
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
        Schema::drop('tsunami_events');
    }
}
