<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['published', 'draft', 'pused']),
            'visibility' => $this->faker->randomElement(['live', 'draft']),
            'start_date' => now()->subDays(rand(0, 30)),
            'end_date' => now()->addDays(rand(1, 30)),
            'url' => $this->faker->url(),
        ];
    }
}
