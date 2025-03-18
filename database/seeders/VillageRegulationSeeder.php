<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VillageRegulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regulations = [
            [
                'title' => 'Peraturan Desa tentang APBDes Tahun 2024',
                'description' => 'Peraturan mengenai Anggaran Pendapatan dan Belanja Desa Tahun 2024',
                'type' => 'produk_hukum',
                'category' => 'apbdes',
                'number' => '01/PD/2024',
                'date_enacted' => Carbon::create(2024, 1, 5),
                'file_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'SK Pengangkatan Perangkat Desa',
                'description' => 'Surat Keputusan tentang pengangkatan perangkat desa periode 2024-2029',
                'type' => 'produk_hukum',
                'category' => 'sk_kades',
                'number' => '02/SK/2024',
                'date_enacted' => Carbon::create(2024, 1, 10),
                'file_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Laporan Realisasi APBDes 2023',
                'description' => 'Laporan pertanggungjawaban realisasi pelaksanaan APBDes Tahun Anggaran 2023',
                'type' => 'informasi_publik',
                'category' => 'apbdes',
                'number' => '01/LAP/2024',
                'date_enacted' => Carbon::create(2024, 1, 15),
                'file_path' => null,
                'is_published' => true,
            ],
        ];

        DB::table('village_regulations')->insert($regulations);
    }
}
