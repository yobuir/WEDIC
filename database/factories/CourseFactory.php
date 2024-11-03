<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{

    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'description' => $this->faker->sentence,
            'featured_image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'reviewed']),
            'deleted_by' => null,
            'updated_by' => null,
            'created_by' => null,
        ];
    }
}
