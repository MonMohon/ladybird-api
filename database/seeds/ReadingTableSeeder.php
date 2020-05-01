<?php

use Illuminate\Database\Seeder;
use App\Models\Reading;

class ReadingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 1000; $i++) {
            Reading::create([
                'user_id' => 1,
                'device_id' => 1,
                'current' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
            ]);
            Reading::create([
                'user_id' => 1,
                'device_id' => 3,
                'current' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
            ]);
            Reading::create([
                'user_id' => 1,
                'device_id' => 4,
                'current' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
            ]);
        }
    }
}
