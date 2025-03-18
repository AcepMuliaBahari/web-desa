<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Gallery;
use App\Models\Development;
use Illuminate\Http\Request;

class PotentialController extends Controller
{
    public function index()
    {
        $developments = Development::query()
            ->orderByRaw("FIELD(status, 'Proses', 'Belum Dimulai', 'Tertunda', 'Selesai')")
            ->latest()
            ->take(5)
            ->get();

        return view('potensi.index', [
            'umkm' => Umkm::latest()->take(6)->get(),
            'galleries' => Gallery::latest()->take(8)->get(),
            'developments' => $developments,
        ]);
    }

    public function showGallery(Gallery $gallery)
    {
        return view('potensi.gallery-show', compact('gallery'));
    }
} 