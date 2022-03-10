<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::truncate();

        $countries = array(
            array('id' => 83, 'code' => 'GH', 'name' => "Ghana", 'phonecode' => 233),       
        );

        foreach ($countries as $country) {
            Countries::create($country);
        }
    }
}
