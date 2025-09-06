<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    News, Complaint, Letter, Citizen, VillageOfficial,
    VillageProfile, PublicService, Umkm, Finance, Event,Gallery,
};
use App\Models\Statistics\{
    Population,
    Apbdes,
    Idm,
    Sdgs,
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
        $gallery = Gallery::latest()
            ->take(6)
            ->get();

        // Data Pengaduan Terbaru
        $latestComplaints = Complaint::with('citizen')
            ->latest()
            ->take(5)
            ->get();

        $totalPenduduk = Population::sum('laki_laki') + Population::sum('perempuan');

        return view('admin.dashboard', compact(
            'latestNews', 'officials', 'umkm', 'gallery', 'latestComplaints',
            'totalPenduduk'
        ));
    }
}
