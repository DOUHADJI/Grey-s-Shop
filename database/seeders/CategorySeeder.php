<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Téléphones et Tablettes',
                'slug' => Str::slug('Téléphones et Tablettes'),
                'description' => 'Smartphones, tablettes et accessoires.',
            ],
            [
                'name' => 'Ordinateurs et Accessoires',
                'slug' => Str::slug('Ordinateurs et Accessoires'),
                'description' => 'Laptops, desktops et accessoires informatiques.',
            ],
            [
                'name' => 'Télévisions et Audio',
                'slug' => Str::slug('Télévisions et Audio'),
                'description' => 'Téléviseurs, enceintes et systèmes audio.',
            ],
            [
                'name' => 'Appareils Photos et Caméras',
                'slug' => Str::slug('Appareils Photos et Caméras'),
                'description' => 'Appareils photo, caméras et équipements associés.',
            ],
            [
                'name' => 'Gaming et Consoles',
                'slug' => Str::slug('Gaming et Consoles'),
                'description' => 'Consoles de jeux, accessoires et jeux vidéo.',
            ],
            [
                'name' => 'Électroménager',
                'slug' => Str::slug('Électroménager'),
                'description' => 'Petits et grands appareils électroménagers.',
            ],
            [
                'name' => 'Objets Connectés',
                'slug' => Str::slug('Objets Connectés'),
                'description' => 'Montres intelligentes, trackers d\'activité, etc.',
            ],
            [
                'name' => 'Énergie et Éclairage',
                'slug' => Str::slug('Énergie et Éclairage'),
                'description' => 'Piles, batteries, lampes et accessoires.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
