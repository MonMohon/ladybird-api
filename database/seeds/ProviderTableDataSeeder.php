<?php

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'provider_name' => "Ireland Electricity",
        ]);
        Provider::create([
            'provider_name' => "Assam Electricity",
        ]);
    }
}
