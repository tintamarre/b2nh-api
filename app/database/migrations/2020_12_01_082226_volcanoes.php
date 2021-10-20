<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Volcanoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volcanoes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('location')->nullable();
            $table->string('morphology')->nullable();

            $table->text('elevation')->nullable();
            
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
        Schema::drop('volcanoes');
    }
}