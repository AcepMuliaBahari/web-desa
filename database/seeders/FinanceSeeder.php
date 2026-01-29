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
                'title' => 'Bidang Penyelenggaraan Pemerintah Desa ',
                'type' => 'income',
                'amount' => 492584000,
                'kategori' => 'BPenyelenggaraan ',
                'description' => 'Transfer dari Kementerian Desa'
            ],
            [
                'date' => '2024-03-05',
                'title' => 'Bidang Pelaksanaan Pembangunan Desa',
                'type' => 'expense',
                'amount' => 813700000,
                'kategori' => 'Operasional',
                'description' => 'Pembayaran listrik bulan Maret'
            ],
            [
                'date' => '2024-03-10',
                'title' => 'Bidang Pembinaan Kemasyarakatan ',
                'type' => 'expense',
                'amount' => 35750000,
                'kategori' => 'Pembangunan',
                'description' => 'Perbaikan jalan RT 03'
            ],
            [
                'date' => '2024-03-15',
                'title' => 'Bidang Pemberdayaan Masyarakat ',
                'type' => 'expense',
                'amount' => 138000000,
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