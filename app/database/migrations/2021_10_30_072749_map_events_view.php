<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MapEventsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW events_map (id, label, latitude, longitude) 
        AS 
        SELECT 
            id, 
            'Earthquake' as label, 
            latitude,
            longitude
        FROM earthquake_events
        UNION ALL
        SELECT 
            id, 
            'Tsunami' as label, 
            latitude, longitude                                                        
        FROM tsunami_events
        UNION ALL
        SELECT 
            volcano_events.id, 
            'Volcanoes' as label, 
            latitude, longitude                                                            
        FROM volcano_events
        JOIN volcanoes on volcano_events.volcanoLocationId = volcanoes.id
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
        DROP VIEW IF EXISTS events_map
        ");
    }
}
