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
            
            $table->string('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();

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

            $table->integer('missing')->nullable();
            $table->integer('missingAmountOrder')->nullable();

            $table->integer('deaths')->nullable();

            $table->string('startDate')->nullable();
            $table->string('endDate')->nullable();

            $table->mediumText('comments')->nullable();

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
