<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VolcanoesDamagesPerVei extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("

        CREATE VIEW volcanoes_damages_per_vei (
            count,
            vei,
            sum_missing,
            sum_deaths,
            sum_injuries,
            sum_houses_destroyed,
            sum_mios_dollars
          ) 
        AS
        SELECT
            count(id),
            vei,
            SUM(missing),
            SUM(deaths),
            SUM(injuries),
            SUM(housesDestroyed),
            SUM(damageMillionsDollars)
        FROM            
            volcano_events
        GROUP BY
            vei
        ORDER BY
             vei
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
        DROP VIEW IF EXISTS volcanoes_damages_per_vei
        ");
    }
}
