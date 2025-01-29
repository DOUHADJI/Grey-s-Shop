<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'image' => 'https://example.com/image1.jpg',
                'title' => 'Lancement du Samsung Galaxy S23 : Le Smartphone Révolutionnaire',
                'slug' => 'lancement-du-samsung-galaxy-s23',
                'resume' => 'Découvrez le Samsung Galaxy S23, un smartphone ultra-performant avec des fonctionnalités innovantes.',
                'content' => 'Le Samsung Galaxy S23 a été lancé avec des caractéristiques impressionnantes : un processeur puissant, un écran AMOLED dynamique, et un appareil photo de qualité professionnelle. Il s\'agit d\'un modèle haut de gamme qui va certainement marquer l\'année 2023. Découvrez toutes les caractéristiques et pourquoi il est le choix idéal pour les utilisateurs exigeants.',
                'is_published' => true,
                'category_id' => Category::where('name', 'like', '%Téléphones%')->first()->id, 
                'tags' => ['Samsung', 'Smartphone', '5G', 'Écran OLED']
            ],
            [
                'image' => 'https://example.com/image2.jpg',
                'title' => 'Pourquoi le MacBook Pro M2 est le meilleur ordinateur pour les créateurs de contenu',
                'slug' => 'pourquoi-le-macbook-pro-m2-est-le-meilleur-ordinateur',
                'resume' => 'Le MacBook Pro M2 combine puissance et portabilité, parfait pour les créateurs de contenu.',
                'content' => 'Le MacBook Pro M2, avec son nouveau processeur Apple Silicon, offre des performances exceptionnelles pour le montage vidéo, la retouche photo et le design graphique. Sa batterie longue durée et son écran Retina font de ce modèle un choix de prédilection pour les professionnels créatifs. Voici un aperçu des raisons pour lesquelles le MacBook Pro M2 est un investissement incontournable pour les créateurs.',
                'is_published' => true,
                'category_id' => Category::where('name', 'like', '%Ordinateurs%')->first()->id, 
                'tags' => ['MacBook', 'Apple', 'Processeur M2', 'Ordinateur portable']
            ],
            [
                'image' => 'https://example.com/image3.jpg',
                'title' => 'Comparaison entre l\'iPhone 14 et le Google Pixel 7 : Quel est le meilleur choix ?',
                'slug' => 'comparaison-iphone-14-google-pixel-7',
                'resume' => 'Nous comparons l\'iPhone 14 et le Google Pixel 7 pour déterminer lequel offre la meilleure expérience.',
                'content' => 'L\'iPhone 14 et le Google Pixel 7 sont deux des meilleurs smartphones sur le marché, mais lequel mérite votre attention ? Alors que l\'iPhone 14 brille par sa qualité de construction, son écosystème Apple et ses performances globales, le Google Pixel 7 se distingue par son appareil photo exceptionnel et l\'expérience Android pure. Dans cet article, nous plongeons dans les détails pour vous aider à faire le bon choix.',
                'is_published' => true,
                'category_id' => Category::where('name', 'like', '%Téléphones%')->first()->id, 
                'tags' => ['iPhone', 'Google Pixel', 'Android', 'Appareil photo']
            ],
            [
                'image' => 'https://example.com/image4.jpg',
                'title' => 'Comment choisir le meilleur PC gaming de 2023',
                'slug' => 'comment-choisir-le-meilleur-pc-gaming-2023',
                'resume' => 'Vous cherchez un PC Gaming ? Voici les critères essentiels pour faire le bon choix en 2023.',
                'content' => 'Le marché du PC gaming est en constante évolution, avec des composants de plus en plus puissants et une expérience immersive inégalée. Dans cet article, nous vous guiderons à travers les critères essentiels à prendre en compte pour choisir le meilleur PC gaming de 2023. Processeur, carte graphique, mémoire vive, et bien plus encore.',
                'is_published' => true,
                'category_id' => Category::where('name', 'like', '%Ordinateurs%')->first()->id, 
                'tags' => ['PC Gaming', 'Carte graphique', 'Processeur Intel', 'SSD']
            ],
        ];

        foreach ($posts as $postData) {

            $postId = DB::table('posts')->insertGetId([
                'image' => $postData['image'],
                'title' => $postData['title'],
                'slug' => $postData['slug'],
                'resume' => $postData['resume'],
                'content' => $postData['content'],
                'is_published' => $postData['is_published'],
                'category_id' => $postData['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $tags = Tag::whereIn('name', $postData['tags'])->get();

            foreach ($tags as $tag) {
                DB::table('post_tags')->insert([
                    'post_id' => $postId,
                    'tag_id' => $tag->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
