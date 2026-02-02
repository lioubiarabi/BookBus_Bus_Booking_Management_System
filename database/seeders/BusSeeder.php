<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    public function run(): void
    {
        $buses = [];
        for ($i = 1; $i <= 10; $i++) {
            $buses[] = [
                'model' => 'Mercedes-Benz Travego ' . $i,
                'registration_number' => 'A-' . rand(10000, 99999) . '-26',
                'passengers_limit' => 50,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('buses')->insert($buses);
    }
}
