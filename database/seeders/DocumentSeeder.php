<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    public function run()
    {
        DB::table('documents')->insert([
            [
                'title' => 'Peraturan Desa tentang Keuangan',
                'category' => 'Keuangan',
                'file_path' => 'dokumen/peraturan_keuangan.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Anggaran Desa 2024',
                'category' => 'Anggaran',
                'file_path' => 'dokumen/anggaran_desa_2024.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

