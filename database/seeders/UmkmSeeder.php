<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        $umkm = [
            [
                'name' => 'Warung Makan Bu Siti',
                'description' => 'Menyediakan berbagai masakan rumahan khas Sunda dengan cita rasa autentik',
                'price' => 15000.00,
                'image' => 'images/umkm/warung-bu-siti.jpg',
                'owner_name' => 'Siti Aminah',
                'contact' => '08123456789',
                'address' => 'Jl. Desa No. 123, RT 01/RW 02',
                'category' => 'Kuliner',
                'is_active' => true,
            ],
            [
                'name' => 'Kerajinan Bambu Pak Asep',
                'description' => 'Produk kerajinan tangan dari bambu berkualitas tinggi',
                'price' => 50000.00,
                'image' => 'images/umkm/kerajinan-bambu.jpg',
                'owner_name' => 'Asep Saepudin',
                'contact' => '08234567890',
                'address' => 'Jl. Desa No. 45, RT 03/RW 01',
                'category' => 'Kerajinan',
                'is_active' => true,
            ],
        ];

        foreach ($umkm as $data) {
            Umkm::create($data);
        }
    }
}

