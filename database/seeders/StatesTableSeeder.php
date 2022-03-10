<?php

namespace Database\Seeders;

use App\Models\States;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        States::truncate();

        $states = array(      
            array('name' => "Ahafo", 'country_id' => 1),
            array('name' => "Ashanti", 'country_id' => 1),
            array('name' => "Bono", 'country_id' => 1),
            array('name' => "Bono East", 'country_id' => 1),
            array('name' => "Central", 'country_id' => 1),
            array('name' => "Eastern", 'country_id' => 1),
            array('name' => "Greater Accra", 'country_id' => 1),
            array('name' => "North East", 'country_id' => 1),
            array('name' => "Northern", 'country_id' => 1),
            array('name' => "Oti", 'country_id' => 1),
            array('name' => "Savannah", 'country_id' => 1),
            array('name' => "Upper East", 'country_id' => 1),
            array('name' => "Upper West", 'country_id' => 1),
            array('name' => "Volta", 'country_id' => 1),
            array('name' => "Western", 'country_id' => 1),
            array('name' => "Western North", 'country_id' => 1),

        );

        foreach ($states as $state) {
            States::create($state);
        }
    }
}
