<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Rapat Koordinasi Desa',
                'description' => 'Rapat untuk membahas program kerja tahun depan dan evaluasi program tahun berjalan. Dihadiri oleh seluruh perangkat desa dan BPD.',
                'location' => 'Balai Desa Sukamaju',
                'event_date' => '2024-12-10',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gotong Royong Bersih Desa',
                'description' => 'Kegiatan gotong royong untuk membersihkan area desa dalam rangka menyambut HUT RI. Seluruh warga diharapkan berpartisipasi.',
                'location' => 'Area Desa Sukamaju',
                'event_date' => '2024-12-15',
                'start_time' => '07:00:00',
                'end_time' => '10:00:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Posyandu Balita',
                'description' => 'Pemeriksaan kesehatan rutin untuk balita meliputi penimbangan berat badan, pengukuran tinggi badan, dan pemberian vitamin.',
                'location' => 'Posyandu Desa Sukamaju',
                'event_date' => '2024-12-20',
                'start_time' => '08:00:00',
                'end_time' => '11:00:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pelatihan UMKM Digital',
                'description' => 'Pelatihan pemasaran digital untuk pelaku UMKM desa. Materi meliputi penggunaan marketplace dan media sosial untuk promosi.',
                'location' => 'Aula Desa Sukamaju',
                'event_date' => '2024-12-25',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

