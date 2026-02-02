<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        $cities = DB::table('cities')->get()->keyBy('name');

        $busIds = DB::table('buses')->pluck('id')->toArray();

        if (empty($busIds) || $cities->isEmpty()) {
            $this->command->warn('Skipping RouteSeeder: Missing cities, drivers, or buses.');
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
            $cityA = $cities[$pair[0]] ?? null;
            $cityB = $cities[$pair[1]] ?? null;

            if ($cityA && $cityB) {
                // Calculate Distance using Euclidean formula: sqrt((x2-x1)² + (y2-y1)²)
                $distUnits = sqrt(pow($cityB->x - $cityA->x, 2) + pow($cityB->y - $cityA->y, 2));

                // Convert to "Real" values
                $distanceKm = (int) ($distUnits * $scaleFactor);
                $durationMin = (int) ($distanceKm * 0.9); // Approx 1.1 min per km (avg 60-70km/h with stops)
                $price = (float) ($distanceKm * 0.45); // Approx 0.45 MAD per km

                // Create Route A -> B
                $routes[] = $this->createRouteArray($cityA->id, $cityB->id, $distanceKm, $durationMin, $price, $busIds);

                // Create Route B -> A (The return trip)
                $routes[] = $this->createRouteArray($cityB->id, $cityA->id, $distanceKm, $durationMin, $price, $busIds);
            }
        }

        DB::table('routes')->insert($routes);
    }

    /**
     * Helper to format the route array
     */
    private function createRouteArray($depId, $arrId, $dist, $dur, $price, $buses)
    {
        return [
            'departure_city' => $depId,
            'arrival_city' => $arrId,
            'distance' => $dist,
            'duration' => $dur,
            'price' => number_format($price, 2, '.', ''),
            // Assign random Bus for now
            'bus_id' => $buses[array_rand($buses)],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
