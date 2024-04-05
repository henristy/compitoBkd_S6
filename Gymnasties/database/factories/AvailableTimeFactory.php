<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvailableTime>
 */
class AvailableTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_id' => Activity::all()->random()->id,
            'date' => $this->faker->dateTimeBetween('now', '+3 weeks')->format('Y-m-d'),
            'start_time' => fake()->dateTimeBetween('-1 days', '+1 days')->format('H').':00',
        ];
    }
}
