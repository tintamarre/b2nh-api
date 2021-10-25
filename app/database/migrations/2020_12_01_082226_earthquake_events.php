<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EarthquakeEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earthquake_events', function (Blueprint $table) {
            $table->id();
            $table->string('locationName')->nullable();
            $table->string('country')->nullable();
            
            $table->string('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('minute')->nullable();
            $table->integer('second')->nullable();

            $table->string('regionCode')->nullable();

            $table->string('intensity')->nullable();

            $table->integer('tsunamiEventId')->nullable();
            $table->integer('volcanoEventId')->nullable();

            $table->string('damageAmountOrder')->nullable();
            $table->string('damageMillionsDollars')->nullable();
   
            $table->string('deathsAmountOrder')->nullable();

            $table->string('housesDestroyed')->nullable();
            $table->string('housesDestroyedAmountOrder')->nullable();
            $table->string('housesDestroyedTotal')->nullable();

            
            $table->string('housesDamaged')->nullable();
            $table->string('housesDamagedAmountOrder')->nullable();
            $table->string('housesDamagedTotal')->nullable();

            
            $table->string('eqMagnitude')->nullable();
            $table->string('eqDepth')->nullable();
            $table->string('eqMagUnk')->nullable();

            $table->string('injuries')->nullable();
            $table->string('injuriesAmountOrder')->nullable();
            $table->string('injuriesTotal')->nullable();


            $table->text('area')->nullable();

            $table->integer('missing')->nullable();
            $table->integer('missingAmountOrder')->nullable();
            $table->integer('missingTotal')->nullable();

            $table->integer('deaths')->nullable();

            $table->mediumText('comments')->nullable();

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
        Schema::drop('earthquake_events');
    }
}
