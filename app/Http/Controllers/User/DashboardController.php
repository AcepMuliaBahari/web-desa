<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        
        // Contoh data untuk dashboard
        // Dalam implementasi nyata, Anda akan mengambil data dari database
        $letterCount = 5; // Jumlah permohonan surat
        $complaintCount = 2; // Jumlah pengaduan
        $newsCount = 10; // Jumlah berita baru
        
        // Data untuk tabel permohonan terbaru
        $recentLetters = [
            [
                'id' => 1,
                'type' => 'Surat Keterangan Domisili',
                'date' => '10 Maret 2023',
                'status' => 'Selesai'
            ],
            [
                'id' => 2,
                'type' => 'Surat Keterangan Usaha',
                'date' => '5 Maret 2023',
                'status' => 'Diproses'
            ],
            [
                'id' => 3,
                'type' => 'Surat Keterangan Tidak Mampu',
                'date' => '1 Maret 2023',
                'status' => 'Ditolak'
            ]
        ];
        
        // Data untuk berita terbaru
        $recentNews = [
            [
                'id' => 1,
                'title' => 'Pembangunan Jalan Desa Tahap II Dimulai',
                'date' => '15 Maret 2023',
                'color' => 'blue'
            ],
            [
                'id' => 2,
                'title' => 'Vaksinasi COVID-19 Booster Untuk Lansia',
                'date' => '10 Maret 2023',
                'color' => 'green'
            ],
            [
                'id' => 3,
                'title' => 'Pelatihan UMKM Digital Untuk Warga Desa',
                'date' => '5 Maret 2023',
                'color' => 'purple'
            ]
        ];
        
        // Data untuk agenda desa
        $upcomingEvents = [
            [
                'id' => 1,
                'title' => 'Musyawarah Desa Triwulan I',
                'date' => '20 Maret 2023, 09:00 WIB',
                'color' => 'red'
            ],
            [
                'id' => 2,
                'title' => 'Gotong Royong Bersih Desa',
                'date' => '25 Maret 2023, 07:00 WIB',
                'color' => 'yellow'
            ],
            [
                'id' => 3,
                'title' => 'Peringatan Hari Kartini',
                'date' => '21 April 2023, 08:00 WIB',
                'color' => 'indigo'
            ]
        ];
        
        return view('user.dashboard', compact(
            'user', 
            'letterCount', 
            'complaintCount', 
            'newsCount', 
            'recentLetters', 
            'recentNews', 
            'upcomingEvents'
        ));
    }
} 