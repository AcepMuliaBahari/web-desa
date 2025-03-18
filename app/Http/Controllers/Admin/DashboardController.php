<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    News, Complaint, Letter, Citizen, VillageOfficial, 
    VillageProfile, PublicService, Umkm, Finance, Event,
};
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Tidak perlu middleware di sini karena sudah ditangani di route group
    }

    public function index()
    {
        // Data Berita Terbaru
        $latestNews = News::latest()
            ->take(5)
            ->get();

        // Data Pejabat
        $officials = VillageOfficial::latest()
            ->take(6)
            ->get();

        // Data UMKM
        $umkm = Umkm::latest()
            ->take(6)
            ->get();

        // Data Galeri
        $gallery = VillageProfile::latest()
            ->take(6)
            ->get();

        // Data Penduduk
        $totalCitizens = Citizen::count();
        $totalFamilies = Citizen::distinct('no_kk')->count();

        // Data Surat
        $totalLetters = Letter::count();
        $approvedLetters = Letter::where('status', 'approved')->count();
        $rejectedLetters = Letter::where('status', 'rejected')->count();
        $pendingLetters = Letter::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'latestNews', 'officials', 'umkm', 'gallery',
            'totalCitizens', 'totalFamilies',
            'totalLetters', 'approvedLetters', 'rejectedLetters', 'pendingLetters'
        ));
    }
} 