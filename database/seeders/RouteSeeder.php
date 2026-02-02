<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Fetch all cities to get their coordinates
        $cities = DB::table('cities')->get()->keyBy('name');

        if ($cities->isEmpty()) {
            $this->command->warn('Skipping RouteSeeder: No cities found.');
            return;
        }

        $connections = [
            ['Dakhla', 'Layoune'],
            ['Layoune', 'Agadir'],
            ['Agadir', 'Essaouira'],
            ['Agadir', 'Marrakech'],
            ['Essaouira', 'Safi'],
            ['Essaouira', 'Marrakech'],
            ['Safi', 'Casablanca'],
            ['Safi', 'Marrakech'],
            ['Marrakech', 'Casablanca'],
            ['Marrakech', 'Beni Mellal'],
            ['Beni Mellal', 'Fes'],
            ['Beni Mellal', 'Casablanca'],
            ['Casablanca', 'Rabat'],
            ['Rabat', 'Tangier'],
            ['Rabat', 'Fes'],
            ['Tangier', 'Fes'],
            ['Fes', 'Oujda'],
            ['Fes', 'Nador'],
            ['Nador', 'Oujda'],
        ];

        $routes = [];
        $scaleFactor = 100; // 1 unit in your grid ≈ 100km real world distance

        foreach ($connections as $pair) {
            $nameA = $pair[0];
            $nameB = $pair[1];

            // Ensure both cities exist in the database
            if (isset($cities[$nameA]) && isset($cities[$nameB])) {
                $cityA = $cities[$nameA];
                $cityB = $cities[$nameB];

                // Calculate Distance: Euclidean formula
                $distUnits = sqrt(pow($cityB->x - $cityA->x, 2) + pow($cityB->y - $cityA->y, 2));

                // Convert to "Real" values
                $distanceKm = (int) ($distUnits * $scaleFactor);
                // Approx 1.1 min per km (avg 60-70km/h with stops)
                $durationMin = (int) ($distanceKm * 0.9);
                // Approx 0.45 MAD per km
                $price = (float) ($distanceKm * 0.45);

                $routes[] = [
                    'cityA' => $cityA->id,
                    'cityB' => $cityB->id,
                    'distance' => $distanceKm,
                    'duration' => $durationMin,
                    'price' => number_format($price, 2, '.', ''),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('routes')->insert($routes);
    }
}
