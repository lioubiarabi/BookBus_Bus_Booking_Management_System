<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(), // Added based on your migration
            'role' => 'user', // Default role
            'password' => static::$password ??= Hash::make('password')
        ];
    }

    // specific state for drivers
    public function driver(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'driver',
        ]);
    }

    // specific state for admin
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'email' => 'admin@bookbus.com',
            'name' => 'Admin User',
        ]);
    }
}
