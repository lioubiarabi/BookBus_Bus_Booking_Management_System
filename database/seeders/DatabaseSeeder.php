<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create 1 Admin
        User::factory()->admin()->create();

        // 2. Create 5 Drivers (Required for Routes)
        User::factory(5)->driver()->create();

        // 3. Create 10 Regular Users (Passengers)
        User::factory(10)->create();

        // 4. Run the rest of the seeders
        $this->call([
            CitySeeder::class,
            BusSeeder::class,
            RouteSeeder::class,
        ]);
    }
}
