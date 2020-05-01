<?php

use Illuminate\Database\Seeder;
use App\Models\SystemSetup;

class SetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemSetup::create([
            'user_id' => 1,
            'provider_id' => 1,
            'meter_id' => 3,
            'provider_contact_date' => "2021-12-01",
            'wifi_name' => "minimi",
            'wifi_password' => "minimi-wifi",
        ]);
    }
}
