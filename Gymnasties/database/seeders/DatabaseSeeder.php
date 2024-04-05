<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'user',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        \App\Models\User::factory(3)->create();

        $this->call([
            ActivitySeeder::class,
            AvailableTimeSeeder::class,
            BookingSeeder::class,
            
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }

}
