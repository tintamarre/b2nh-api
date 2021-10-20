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
            
            $table->text('year')->nullable();
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

            $table->integer('housesDestroyed')->nullable();
            $table->integer('housesDestroyedAmountOrder')->nullable();

            $table->integer('housesDamaged')->nullable();
            $table->integer('housesDamagedAmountOrder')->nullable();


            $table->integer('injuries')->nullable();
            $table->integer('injuriesAmountOrder')->nullable();
            // $table->integer('injuriesTotal')->nullable();

            $table->integer('maxWaterHeight')->nullable();
       

            $table->text('tsMtAbe')->nullable();
            

            $table->text('area')->nullable();


            // $table->integer('vei')->nullable();

            $table->text('missing')->nullable();
            $table->text('missingAmountOrder')->nullable();


            $table->text('deaths')->nullable();

            // $table->text('startDate')->nullable();
            // $table->text('endDate')->nullable();

            $table->text('comments')->nullable();

            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();

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
        Schema::drop('tsunami_events');
    }
}
