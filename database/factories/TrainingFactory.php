<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{

    protected $model = Training::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'featured_image' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraphs(3, true),
            'category_id' => Category::factory(),
            'availability' => $this->faker->randomElement(['remote', 'onsite']),
            'link' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['internal', 'external']),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'reviewed']),
            'deleted_by' => null,
            'updated_by' => null,
            'created_by' => null,
        ];
    }
}
