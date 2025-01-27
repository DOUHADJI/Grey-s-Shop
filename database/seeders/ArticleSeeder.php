<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach($categories as $category)
        {
            for ($i = 1; $i <= 5; $i++) {
                Article::create([
                    'title' => "{$category->name} - Produit {$i}",
                    'content' => "Description du produit {$i} dans la catégorie {$category->name}. Ce produit est fiable et adapté à vos besoins.",
                    'image' => "articles/{$category->slug}_{$i}.jpg",
                    'price' => rand(2500, 100000),
                    'view_count' => 0,
                    'category_id' => $category->id,
                ]);
            }
        }

    }
}
