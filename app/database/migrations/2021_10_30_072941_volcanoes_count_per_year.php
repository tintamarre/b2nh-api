<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VolcanoesCountPerYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW
        volcanoes_count_per_years (min_year, max_year, count_volcano_events) as
        SELECT
          min(year),
          max(year),
          count(*) as range_count
        FROM
          volcano_events
        WHERE
          year > 1500
        GROUP BY          
            year / 20
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
        DROP VIEW IF EXISTS volcanoes_count_per_years
        ");
    }
}
