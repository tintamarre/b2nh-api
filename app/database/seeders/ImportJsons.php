<?php

namespace Database\Seeders;

use App\Models\Volcano;
use App\Models\VolcanoEvent;
use App\Models\TsunamiEvent;
use App\Models\EarthquakeEvent;
use App\Models\Helper;

use Illuminate\Database\Seeder;
use Storage;

class ImportJsons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Importing helpers...');

        $helpers = json_decode(Storage::disk('local')->get('sources/helper_dataset.json'), true);
        $this->command->getOutput()->progressStart(count($helpers));
        foreach ($helpers as $category => $records) {
            $this->command->getOutput()->progressAdvance();

            foreach ($records as $key => $record) {
                if ($category == 'tsunamis' or $category == 'earthquakes') {
                    foreach ($record as $value) {
                        $kkey =  $category . '_' .  $key .'_'. $value['id'];

                        Helper::firstOrCreate(
                            [
                            'key' => $kkey,
                            'description' => $value['description'],
                        ]
                        );
                    }
                } else {
                    $key =  $category . '_'. $record['id'];

                    Helper::firstOrCreate(
                        [
                            'key' => $key,
                            'description' => $record['description'],
                        ]
                    );
                }
            }
        }
        $this->command->getOutput()->progressFinish();


        $this->command->info('Importing volcanoes...');

        $volcanos = json_decode(Storage::disk('local')->get('sources/volcano_locations.json'), true);
        $this->command->getOutput()->progressStart(count($volcanos));
        foreach ($volcanos as $record) {
            Volcano::firstOrCreate($record);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();

        $this->command->info('Importing volcano\'s events...');
        $volcano_events = json_decode(Storage::disk('local')->get('sources/volcano_events.json'), true);
        $this->command->getOutput()->progressStart(count($volcano_events));
        foreach ($volcano_events as $record) {
            VolcanoEvent::firstOrCreate($record);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();


        $this->command->info('Importing tsunami\'s events...');
        $tsunami_events = json_decode(Storage::disk('local')->get('sources/tsunamis_events.json'), true);
        $this->command->getOutput()->progressStart(count($tsunami_events));
        foreach ($tsunami_events as $record) {
            TsunamiEvent::firstOrCreate($record);
        
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
        

        $this->command->info('Importing earthquake\'s events...');
        $earthquake_events = json_decode(Storage::disk('local')->get('sources/earthquakes_events.json'), true);
        $this->command->getOutput()->progressStart(count($earthquake_events));
        foreach ($earthquake_events as $record) {
            EarthquakeEvent::firstOrCreate($record);
        
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
