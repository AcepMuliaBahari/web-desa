<?php

namespace Database\Seeders;

use App\Models\Development;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        $developments = [
            [
                'title' => 'Pembangunan Jalan Desa',
                'description' => 'Perbaikan dan pengaspalan jalan desa sepanjang 2 KM',
                'start_date' => '2024-01-01',
                'end_date' => '2024-06-30',
                'budget' => 500000000.00,
                'progress' => 60,
                'photo' => 'jalan.jpg',
                'status' => 'Proses',
                'location' => 'RT 01-03/RW 02',
                'pic_name' => 'Ahmad Subarjo',
                'pic_contact' => '08123456789',
            ],
            [
                'title' => 'Renovasi Posyandu',
                'description' => 'Perbaikan dan peningkatan fasilitas Posyandu Desa',
                'start_date' => '2024-02-01',
                'end_date' => '2024-04-30',
                'budget' => 150000000.00,
                'photo' => 'jalan.jpg',
                'progress' => 80,
                'status' => 'Proses',
                'location' => 'RT 02/RW 01',
                'pic_name' => 'Siti Nurjanah',
                'pic_contact' => '08234567890',
            ],
            [
                'title' => 'Pembangunan Taman Desa',
                'description' => 'Pembuatan taman untuk ruang terbuka hijau',
                'start_date' => '2024-03-01',
                'end_date' => '2024-05-30',
                'budget' => 200000000.00,
                'progress' => 0,
                'status' => 'Belum Dimulai',
                'photo' => 'jalan.jpg',
                'location' => 'RT 04/RW 03',
                'pic_name' => 'Budi Santoso',
                'pic_contact' => '08345678901',
            ],
            [
                'title' => 'Renovasi Balai Desa',
                'description' => 'Perbaikan atap dan pengecatan balai desa',
                'start_date' => '2024-01-15',
                'end_date' => '2024-02-28',
                'budget' => 100000000.00,
                'photo' => 'jalan.jpg',
                'progress' => 100,
                'status' => 'Selesai',
                'location' => 'RT 01/RW 01',
                'pic_name' => 'Joko Widodo',
                'pic_contact' => '08456789012',
            ],
        ];

        foreach ($developments as $data) {
            Development::create($data);
        }
    }
} 