<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    public function run()
    {
        DB::table('resources')->insert([
            [
                'type' => 'penduduk',
                'year' => 2024,
                'value' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'keuangan',
                'year' => 2024,
                'value' => 100000000, // Contoh: 100 juta
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

