<?php

namespace Database\Seeders;

use App\Models\Finance;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        $finances = [
            [
                'date' => '2024-03-01',
                'title' => 'Dana Desa Tahap 1',
                'type' => 'income',
                'amount' => 100000000,
                'kategori' => 'Bantuan',
                'description' => 'Transfer dari Kementerian Desa'
            ],
            [
                'date' => '2024-03-05',
                'title' => 'Pembayaran Listrik Kantor Desa',
                'type' => 'expense',
                'amount' => 500000,
                'kategori' => 'Operasional',
                'description' => 'Pembayaran listrik bulan Maret'
            ],
            [
                'date' => '2024-03-10',
                'title' => 'Perbaikan Jalan Desa',
                'type' => 'expense',
                'amount' => 25000000,
                'kategori' => 'Pembangunan',
                'description' => 'Perbaikan jalan RT 03'
            ],
            [
                'date' => '2024-03-15',
                'title' => 'Bantuan Sosial',
                'type' => 'expense',
                'amount' => 10000000,
                'kategori' => 'Bantuan',
                'description' => 'Bantuan untuk warga kurang mampu'
            ],
            [
                'date' => '2024-03-20',
                'title' => 'Retribusi Pasar',
                'type' => 'income',
                'amount' => 2500000,
                'kategori' => 'Operasional',
                'description' => 'Pemasukan dari retribusi pasar desa'
            ],
        ];

        foreach ($finances as $finance) {
            Finance::create($finance);
        }
    }
} 