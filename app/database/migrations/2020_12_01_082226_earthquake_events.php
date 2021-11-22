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
            
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('minute')->nullable();
            $table->integer('second')->nullable();

            $table->integer('regionCode')->nullable();

            $table->float('intensity')->nullable();

            $table->integer('tsunamiEventId')->nullable();
            $table->integer('volcanoEventId')->nullable();

            $table->integer('damageAmountOrder')->nullable();
            $table->integer('damageMillionsDollars')->nullable();
   
            $table->integer('deathsAmountOrder')->nullable();

            $table->integer('housesDestroyed')->nullable();
            $table->integer('housesDestroyedAmountOrder')->nullable();
            $table->integer('housesDestroyedTotal')->nullable();

            
            $table->integer('housesDamaged')->nullable();
            $table->integer('housesDamagedAmountOrder')->nullable();
            $table->integer('housesDamagedTotal')->nullable();

            
            $table->float('eqMagnitude')->nullable();
            $table->float('eqDepth')->nullable();
            $table->float('eqMagUnk')->nullable();

            $table->integer('injuries')->nullable();
            $table->integer('injuriesAmountOrder')->nullable();
            $table->integer('injuriesTotal')->nullable();


            $table->text('area')->nullable();

            $table->integer('missing')->nullable();
            $table->integer('missingAmountOrder')->nullable();
            $table->integer('missingTotal')->nullable();

            $table->integer('deaths')->nullable();

            $table->mediumText('comments')->nullable();

            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();

            $table->timestamps();

            $table->foreign('tsunamiEventId')->references('id')->on('tsunami_events');
            $table->foreign('volcanoEventId')->references('id')->on('volcano_events');
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
