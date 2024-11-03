<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{


    protected $model = Team::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'title' => $this->faker->jobTitle,
            'profile' => $this->faker->imageUrl(),
            'bio' => $this->faker->paragraph,
            'linkedin' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'twitter' => $this->faker->url,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'reviewed'])
        ];
    }
}
