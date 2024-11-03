<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{


    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'reviewed']),
            'deleted_by' => null,
            'updated_by' => null,
            'created_by' => null,
        ];
    }
}
