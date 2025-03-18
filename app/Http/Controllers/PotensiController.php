<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::where('is_active', true)
            ->latest()
            ->paginate(12);
            
        return view('potensi.index', compact('potensi'));
    }

    public function show(Potensi $potensi)
    {
        if (!$potensi->is_active) {
            abort(404);
        }
        
        // Load galleries yang terkait dengan potensi ini
        $galleries = $potensi->galleries()
            ->where('is_active', true)
            ->latest()
            ->get();
        
        return view('potensi.show', compact('potensi', 'galleries'));
    }
} 