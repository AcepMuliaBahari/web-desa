<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan direktori storage/app/public/galleries ada
        Storage::makeDirectory('public/galleries');

        // Copy sample images dari public ke storage
        $sampleImages = [
            [
                'title' => 'Kegiatan Gotong Royong',
                'description' => 'Kegiatan gotong royong membersihkan lingkungan desa yang dilakukan setiap minggu',
                'type' => 'image',
                'file' => 'gotong-royong.jpg'
            ],
            [
                'title' => 'Rapat Desa',
                'description' => 'Rapat koordinasi pembangunan desa bersama warga',
                'type' => 'image',
                'file' => 'rapat-desa.jpg'
            ],
            [
                'title' => 'Festival Budaya',
                'description' => 'Festival budaya tahunan desa menampilkan kesenian tradisional',
                'type' => 'video',
                'file' => 'festival.mp4'
            ]
        ];

        foreach ($sampleImages as $image) {
            // Copy file dari folder public/sample ke storage
            $sourcePath = public_path('sample/' . $image['file']);
            $storagePath = 'public/galleries/' . $image['file'];
            
            // Cek apakah file sample ada
            if (File::exists($sourcePath)) {
                Storage::put($storagePath, File::get($sourcePath));

                // Buat record di database
                Gallery::create([
                    'title' => $image['title'],
                    'description' => $image['description'],
                    'type' => $image['type'],
                    'file_path' => $storagePath,
                    'is_active' => true
                ]);
            }
        }
    }
}
