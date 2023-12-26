<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'firstname' => fake()->firstname(),
        //     'lastname' => fake()->lastname(),
        //     'middlename' => fake()->middlename(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' =>now(),
        //     'phone_number' => fake()->phoneNumber(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'address' => fake()->address(),
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
