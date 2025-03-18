<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinanceReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('finance_reports')->insert([
            [
                'type' => 'APBDes',
                'amount' => 200000000, // Contoh: 200 juta
                'year' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Penggunaan Dana Desa',
                'amount' => 150000000, // Contoh: 150 juta
                'year' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

