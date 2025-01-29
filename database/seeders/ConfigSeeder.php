<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        
        if (Config::count() === 0) {
            Config::create([
                'name' => 'ElectroHub',
                'slogan' => 'La Tech à portée de main',
                'email' => 'contact@electrohub.com',
                'contact' => '123-456-7890',
                'address' => '123 Tech Street, Silicon Valley',
                'logo' => null,
                'facebook_page_link' => 'https://facebook.com/ElectroHub',
                'youtube_page_link' => 'https://youtube.com/ElectroHub',
                'instagram_page_link' => 'https://instagram.com/ElectroHub',
            ]);
        }
    }
}
