<?php

use Illuminate\Database\Seeder;
use App\Models\MeterType;

class MetersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeterType::create([
            'meter_name' => "Day",
        ]);
        MeterType::create([
            'meter_name' => "Night",
        ]);
        MeterType::create([
            'meter_name' => "Day/Night",
        ]);
    }
}
