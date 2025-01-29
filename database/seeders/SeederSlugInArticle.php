<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederSlugInArticle extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();

        foreach($articles as $article)
        {
            $article->slug = Str::slug($article->title);
            $article->save();
        }
    }
}
