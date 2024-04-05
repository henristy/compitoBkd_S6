<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\AvailableTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'activity_id' => Activity::all()->random()->id,
            'available_time_id' => AvailableTime::all()->random()->id,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'rejected']),
        ];
    }
}
