<?php

use Illuminate\Database\Seeder;
use Database\Seeders\ImportJsons;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ImportJsons::class);
    }
}
