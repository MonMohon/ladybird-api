<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProviderTableDataSeeder::class);
        $this->call(MetersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RateTableDataSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(SetupTableSeeder::class);
        $this->call(ReadingTableSeeder::class);
    }
}
