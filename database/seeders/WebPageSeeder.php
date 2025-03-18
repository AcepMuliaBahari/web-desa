<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_pages')->insert([
            [
                'title' => 'Tentang Desa',
                'content' => 'Desa Pasir Panjang adalah desa dengan keindahan alam yang luar biasa.',
                'type' => 'Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wisata',
                'content' => 'Pantai Pasir Panjang merupakan destinasi utama wisata di desa ini.',
                'type' => 'Pariwisata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
