<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'benefits' => $this->faker->sentence(8),
            'duration_minutes' => $this->faker->randomElement([15, 20, 30, 45, 60]),
            'image' => $this->faker->imageUrl('300', '300', 'exercise', true, 'gymnasties', true, 'jpg'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
