<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partners>
 */
class PartnersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'url' => $this->faker->url,
            'logo' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'reviewed']),
        ];
    }
}
