<?php

use Illuminate\Database\Seeder;
use App\Models\Device;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'user_id' => 1,
            'location_id' => 1,
            'device_name' => "TV Bed Room",
            'device_image' => "tv-bed-room",
            'device_watt' => 10,
        ]);
        Device::create([
            'user_id' => 1,
            'location_id' => 2,
            'device_name' => "Mohon Mac",
            'device_image' => "mohon-mac",
            'device_watt' => 8,
        ]);
        Device::create([
            'user_id' => 1,
            'location_id' => 3,
            'device_name' => "TV Common Room",
            'device_image' => "tv-common-room",
            'device_watt' => 10,
        ]);
        Device::create([
            'user_id' => 1,
            'location_id' => 4,
            'device_name' => "TV Bed Room",
            'device_image' => "tv-bed-room",
            'device_watt' => 10,
        ]);
    }
}
