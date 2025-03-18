<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('public_services')->insert([
            [
                'service_name' => 'Klinik Kesehatan',
                'description' => 'Pelayanan kesehatan untuk masyarakat desa.',
                'category' => 'Kesehatan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Perpustakaan Desa',
                'description' => 'Menyediakan buku dan referensi untuk warga.',
                'category' => 'Pendidikan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
