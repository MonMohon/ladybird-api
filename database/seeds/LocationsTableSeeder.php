<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'location_name' => "Bed Room",
        ]);
        Location::create([
            'location_name' => "Living Room",
        ]);
        Location::create([
            'location_name' => "Bath Room",
        ]);
        Location::create([
            'location_name' => "Study Room",
        ]);
        Location::create([
            'location_name' => "Common Room",
        ]);
    }
}
