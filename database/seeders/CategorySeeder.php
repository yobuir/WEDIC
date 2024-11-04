<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and accessories',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Fashion apparel and accessories',
            ],
            [
                'name' => 'Books',
                'description' => 'Books, e-books, and publications',
            ],
            [
                'name' => 'Home & Garden',
                'description' => 'Home decor and gardening items',
            ],
            [
                'name' => 'Sports',
                'description' => 'Sports equipment and accessories',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
        }

    }
}
