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

        // "id": 2993,
        // "year": 1498,
        // "month": 9,
        // "day": 20,

        // "latitude": 33.5,
        // "longitude": 135.2,

        // "locationName": "NANKAIDO",
        // "country": "JAPAN",

        // "regionCode": 85,
        // "causeCode": 1,
        // "eventValidity": 4,
        // "damageAmountOrder": 1,
        // "comments": "Sept 20, 1498, 33.5 N, 135.2 E, magnitude 7.5  tsunami intensity 2. Yunomine Hot Spring stopped for 52 days. Hongu shrine wrecked. Nachi temple collapsed. Minato in Wakayama damaged by tsunami of several m in height. (reference #150)",
        // "earthquakeEventId": 653

        Schema::create('volcano_events', function (Blueprint $table) {
            $table->id();
            // $table->string('locationName')->nullable();
            // $table->string('country')->nullable();
            
            $table->text('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();

            // $table->integer('regionCode')->nullable();
            // $table->integer('causeCode')->nullable();
            // $table->integer('eventValidity')->nullable();

            $table->integer('earthquakeEventId')->nullable();
            $table->integer('tsunamiEventId')->nullable();
            $table->integer('volcanoLocationId')->nullable();

            $table->integer('damageAmountOrder')->nullable();
            $table->integer('damageMillionsDollars')->nullable();
   
            $table->integer('deathsAmountOrder')->nullable();

            $table->integer('housesDestroyed')->nullable();
            $table->integer('housesDestroyedAmountOrder')->nullable();

            $table->integer('injuries')->nullable();
            $table->integer('injuriesAmountOrder')->nullable();
            $table->integer('injuriesTotal')->nullable();

            
            $table->integer('vei')->nullable();

            $table->text('missing')->nullable();
            $table->text('missingAmountOrder')->nullable();


            $table->integer('deaths')->nullable();

            $table->text('startDate')->nullable();
            $table->text('endDate')->nullable();

            $table->text('comments')->nullable();

            // $table->text('latitude')->nullable();
            // $table->text('longitude')->nullable();

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
        Schema::drop('volcano_events');
    }
}
