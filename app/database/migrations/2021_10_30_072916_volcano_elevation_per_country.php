<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VolcanoElevationPerCountry extends Migration
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
        volcano_elevation_per_country (country, count, avg_elevation, max_elevation) 
        AS
        SELECT
            country,
            count(id),
            avg(elevation),
            max(elevation)
        FROM
            volcanoes
        GROUP BY
            country
        ORDER BY
            max(elevation) desc
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
        DROP VIEW IF EXISTS volcano_elevation_per_country
        ");
    }
}
