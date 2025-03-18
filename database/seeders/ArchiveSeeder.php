<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('archives')->insert([
            [
                'title' => 'Laporan Tahunan 2022',
                'category' => 'Laporan',
                'year' => 2022,
                'file_path' => 'files/archives/annual-report-2022.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dokumen Kebijakan 2021',
                'category' => 'Kebijakan',
                'year' => 2021,
                'file_path' => 'files/archives/policy-2021.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Surat Keputusan 2020',
                'category' => 'Keputusan',
                'year' => 2020,
                'file_path' => 'files/archives/decision-2020.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Prosedur Operasi Standar',
                'category' => 'Prosedur',
                'year' => 2019,
                'file_path' => 'files/archives/sop-2019.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panduan Penggunaan Sistem',
                'category' => 'Panduan',
                'year' => 2023,
                'file_path' => 'files/archives/system-guide-2023.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dokumen Proyek 2018',
                'category' => 'Proyek',
                'year' => 2018,
                'file_path' => 'files/archives/project-2018.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
