<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('village_profiles')->insert([
            [
                'name' => 'Desa Pasir Panjang',
                'history' => 'Desa ini berdiri sejak tahun 1900 dan terkenal dengan wisata pantainya.',
                'vision' => 'Menjadi desa wisata terkemuka di Indonesia.',
                'mission' => 'Meningkatkan kesejahteraan masyarakat melalui pariwisata.',
                'contact_phone' => '08123456789',
                'contact_email' => 'contact@pasirpanjang.com',
                'address' => 'Jl. Pantai Indah No. 1, Pasir Panjang',
                'latitude' => '-6.123456',
                'longitude' => '106.123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
