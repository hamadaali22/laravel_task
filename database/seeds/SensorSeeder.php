<?php

use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Sensor::create([
              'tds_data'=>'555',
              'ph_data'=>'0',
              'water_temp_data'=>'27',
              'water_level_data'=>'66',
              'water_flow_speed_data'=>'22',
              'air_temp_data'=>'35',
          ]);
    }
}
