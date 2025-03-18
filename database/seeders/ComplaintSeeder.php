<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Citizen;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        $citizens = Citizen::all();
        
        if ($citizens->isEmpty()) {
            // Jika tidak ada citizen, jalankan CitizenSeeder terlebih dahulu
            $this->call(CitizenSeeder::class);
            $citizens = Citizen::all();
        }

        $complaints = [
            [
                'content' => 'Jalan di RT 03 rusak dan berlubang',
                'category' => 'Infrastruktur',
                'status' => 'pending'
            ],
            [
                'content' => 'Lampu penerangan jalan di gang Mawar mati',
                'category' => 'Fasilitas Umum',
                'status' => 'processed',
                'response' => 'Sudah dijadwalkan perbaikan minggu depan'
            ],
            [
                'content' => 'Sampah menumpuk di pojok gang Melati',
                'category' => 'Kebersihan',
                'status' => 'resolved',
                'response' => 'Sudah dibersihkan oleh petugas kebersihan'
            ]
        ];

        foreach ($complaints as $complaint) {
            Complaint::create([
                'citizen_id' => $citizens->random()->id,
                'content' => $complaint['content'],
                'category' => $complaint['category'],
                'status' => $complaint['status'],
                'response' => $complaint['response'] ?? null
            ]);
        }
    }
}

