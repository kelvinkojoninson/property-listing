<?php

namespace Database\Seeders;

use App\Models\BuildingTypes;
use Illuminate\Database\Seeder;

class BuildingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingTypes::truncate();

        $buildingTypes =  [
            [
                'description' => 'Retail Location',
                'createuser' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ], [
                'description' => 'Flats',
                'createuser' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ], [
                'description' => 'Bungalows',
                'createuser' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ], [
                'description' => 'Real Estates',
                'createuser' => 'admin',
                'createdate' => date('Y-m-d H:i:s'),
            ], 
        ];

        foreach ($buildingTypes as $buildingType) {
            BuildingTypes::create($buildingType);
        }
    }
}
