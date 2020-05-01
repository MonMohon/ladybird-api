<?php

use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::create([
            'provider_id' => 1,
            'rate' => 20,
        ]);
        Rate::create([
            'provider_id' => 2,
            'rate' => 10,
        ]);
    }
}
