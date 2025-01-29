<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {

        $tags = [
            'Smartphone',
            'Téléphone Android',
            'iPhone',
            'Samsung',
            'Huawei',
            'Xiaomi',
            'Google Pixel',
            'Apple',
            'Téléphone reconditionné',
            '5G',
            'Écran OLED',
            'Téléphone pas cher',
            'Accessoires Smartphone',
            'Batterie longue durée',
            'Appareil photo',
            'Système d\'exploitation Android',
            'Système d\'exploitation iOS',
            'Tablette',
            'Ordinateur portable',
            'PC Gaming',
            'PC de bureau',
            'MacBook',
            'Windows 11',
            'Chromebook',
            'RAM',
            'Processeur Intel',
            'Processeur AMD',
            'SSD',
            'Carte graphique NVIDIA',
            'Ordinateur portable pas cher',
            'Accessoires ordinateurs',
            'Périphériques PC',
            'Écran PC',
            'Batterie ordinateur',
            'Tendances technologiques',
            'Réduction de prix',
            'Promotions',
            'Vente Flash',
            'PC tout-en-un',
            'Téléphone haut de gamme',
            'Technologie mobile',
            'Innovation',
        ];


        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
