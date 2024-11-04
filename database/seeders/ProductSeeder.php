<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'Premium Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation, 30-hour battery life, and premium sound quality. Perfect for music lovers and professionals.',
                'price' => 199.99,
                'quantity' => 100,
                'measurements' => 'Length: 28 inches, Chest: 40 inches, Sleeve Length: 34 inches',
                'category_name' => 'Electronics',
                'images' => [
                    'https://placehold.co/400',
                    'https://placehold.co/400',
                ]
            ],
            [
                'name' => 'Classic Denim Jacket',
                'description' => 'Timeless denim jacket made from premium quality cotton. Features a comfortable fit, multiple pockets, and classic styling.',
                'price' => 79.99,
                'quantity' => 50,
                'measurements' => 'Length: 28 inches, Chest: 40 inches, Sleeve Length: 34 inches',
                'category_name' => 'Clothing',

                'images' => [
                    'https://placehold.co/400',
                    'https://placehold.co/400',
                    'https://placehold.co/400',
                ]
            ],


        ];

        foreach ($products as $productData) {
            $category = $categories->where('name', $productData['category_name'])->first();

            $product = Product::create([
                'name' => $productData['name'],
                'featured_image'=> "https://placehold.co/400",
                'description' => $productData['description'],
                'price' => $productData['price'],
                'quantity' => $productData['quantity'],
                'measurement_unit' => 'pcs',
                'category_id' => $category->id,
                'status' => 'available',
            ]);

        }

        foreach ($categories as $category) {
            // Create 4 products per category
            for ($i = 0; $i < 4; $i++) {
                $product = Product::create([
                    'name' => $this->generateProductName($category->name),
                    'featured_image'=> "https://placehold.co/400",
                    'description' => fake()->paragraphs(2, true),
                    'price' => fake()->randomFloat(2, 10, 1000),
                    'quantity' => rand(10, 100),
                    'measurement_unit' => 'pcs',
                    'category_id' => $category->id,
                    'status' => 'available',
                ]);

            }
        }
    }

    private function generateProductName($categoryName)
    {
        $names = [
            'Electronics' => [
                'prefixes' => ['Smart', 'Pro', 'Ultra', 'Digital', 'Wireless'],
                'products' => ['Speaker', 'Tablet', 'Camera', 'Earbuds', 'Charger'],
                'suffixes' => ['Plus', 'Pro', 'Max', 'Elite', 'Premium']
            ],
        ];

        $category = $names[$categoryName] ?? $names['Electronics'];

        $prefix = $category['prefixes'][array_rand($category['prefixes'])];
        $product = $category['products'][array_rand($category['products'])];
        $suffix = $category['suffixes'][array_rand($category['suffixes'])];

        return "{$prefix} {$product} {$suffix}";
    }

    private function generateImageUrl($categoryName, $index)
    {
        return "products/" . strtolower(str_replace(['&', ' '], ['and', '-'], $categoryName)) . "-{$index}.jpg";
    }
}
