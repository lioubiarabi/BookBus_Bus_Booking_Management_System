<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrajetSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Get a bus (You might want to assign specific buses to specific times later)
        $busId = DB::table('buses')->where('status', 'active')->value('id');

        if (!$busId) {
            $this->command->warn('Skipping TrajetSeeder: No active buses found.');
            return;
        }

        // 2. Define ONLY the Atlantic Line (Tangier <-> Dakhla)
        $paths = [
            // Southbound: Tangier -> Dakhla (Morning Bus)
            [
                'name' => 'Atlantic Line (Sud) - Matin',
                'direction' => 'South',
                'departure_time' => '08:00:00',
                'cities' => ['Tangier', 'Rabat', 'Casablanca', 'Safi', 'Essaouira', 'Agadir', 'Layoune', 'Dakhla']
            ],
            // Southbound: Tangier -> Dakhla (Night Bus)
            [
                'name' => 'Atlantic Line (Sud) - Soir',
                'direction' => 'South',
                'departure_time' => '20:00:00',
                'cities' => ['Tangier', 'Rabat', 'Casablanca', 'Safi', 'Essaouira', 'Agadir', 'Layoune', 'Dakhla']
            ],

            // Northbound: Dakhla -> Tangier (Morning Bus)
            [
                'name' => 'Atlantic Line (Nord) - Matin',
                'direction' => 'North',
                'departure_time' => '07:00:00',
                'cities' => ['Dakhla', 'Layoune', 'Agadir', 'Essaouira', 'Safi', 'Casablanca', 'Rabat', 'Tangier']
            ],
            // Northbound: Dakhla -> Tangier (Night Bus)
            [
                'name' => 'Atlantic Line (Nord) - Soir',
                'direction' => 'North',
                'departure_time' => '19:00:00',
                'cities' => ['Dakhla', 'Layoune', 'Agadir', 'Essaouira', 'Safi', 'Casablanca', 'Rabat', 'Tangier']
            ]
        ];

        // 3. Process each Path
        foreach ($paths as $pathData) {
            // A. Create the Trajet Record with the new time
            $trajetId = DB::table('trajet')->insertGetId([
                'name' => $pathData['name'],
                'direction' => $pathData['direction'],
                'departure_time' => $pathData['departure_time'], // Insert the time
                'bus_id' => $busId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info("Created Trajet: {$pathData['name']} at {$pathData['departure_time']}");

            // B. Find and Link the Routes (Segments)
            $stops = $pathData['cities'];

            for ($i = 0; $i < count($stops) - 1; $i++) {
                $cityA_Name = $stops[$i];
                $cityB_Name = $stops[$i+1];

                $cityA = DB::table('cities')->where('name', $cityA_Name)->first();
                $cityB = DB::table('cities')->where('name', $cityB_Name)->first();

                if ($cityA && $cityB) {
                    // Check for route A->B or B->A
                    $route = DB::table('routes')
                        ->where(function($query) use ($cityA, $cityB) {
                            $query->where('cityA', $cityA->id)->where('cityB', $cityB->id);
                        })
                        ->orWhere(function($query) use ($cityA, $cityB) {
                            $query->where('cityA', $cityB->id)->where('cityB', $cityA->id);
                        })
                        ->first();

                    if ($route) {
                        DB::table('trajet_routes')->insert([
                            'trajet_id' => $trajetId,
                            'route_id' => $route->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
