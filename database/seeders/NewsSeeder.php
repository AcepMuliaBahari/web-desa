<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Pembangunan Jalan Desa',
                'content' => 'Pembangunan jalan desa telah dimulai dan diperkirakan selesai dalam 3 bulan',
                'category' => 'Pembangunan',
                'slug' => 'pembangunan-jalan-desa',
            ],
            [
                'title' => 'Vaksinasi Covid-19',
                'content' => 'Program vaksinasi Covid-19 akan dilaksanakan minggu depan',
                'category' => 'Kesehatan',
                'slug' => 'vaksinasi-covid-19',
            ],
            [
                'title' => 'Pelatihan UMKM',
                'content' => 'Pelatihan UMKM untuk warga desa akan diadakan bulan depan',
                'category' => 'UMKM',
                'slug' => 'pelatihan-umkm',
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
