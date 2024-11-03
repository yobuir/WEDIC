<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */


class BlogFactory extends Factory
{


    protected $model = Blog::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'featured_image' => $this->faker->imageUrl(),
            'category_id' => Category::factory(),
            'slug' => Str::slug($this->faker->sentence),
            'title' => $this->faker->sentence,
            'header' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'deleted_by' => null,
            'updated_by' => $this->faker->randomDigitNotNull,
            'created_by' => $this->faker->randomDigitNotNull,
        ];
    }
}
