<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menu::insert([
            ['name' => 'Nasi Goreng Spesial', 'category' => 'Makanan Utama', 'price' => 25000, 'description' => 'Nasi goreng dengan ayam, telur, dan sambal.', 'type' => 'food'],
            ['name' => 'Ayam Bakar', 'category' => 'Makanan Utama', 'price' => 30000, 'description' => 'Ayam bakar dengan sambal khas.', 'type' => 'food'],
            ['name' => 'Es Teh Manis', 'category' => 'Minuman', 'price' => 5000, 'description' => 'Teh manis dengan es batu.', 'type' => 'drink'],
            ['name' => 'Jus Jeruk', 'category' => 'Minuman', 'price' => 15000, 'description' => 'Jus jeruk segar.', 'type' => 'drink'],
        ]);
    }
}
