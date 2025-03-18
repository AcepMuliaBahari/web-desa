<?php

namespace App\Http\Controllers;

use App\Models\VillageOfficial;
use Illuminate\Http\Request;

class VillageOfficialController extends Controller
{
    /**
     * Mengambil data pejabat aktif untuk ditampilkan
     */
    public static function getActiveOfficials()
    {
        return VillageOfficial::where('is_active', true)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officials = VillageOfficial::where('is_active', true)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->get();
                    
        // Debug: Log data yang diambil
        \Illuminate\Support\Facades\Log::info('Officials Data:', [
            'count' => $officials->count(),
            'data' => $officials->toArray()
        ]);
                    
        return view('components.home.organization', compact('officials'));
    }

    /**
     * Menampilkan halaman struktur organisasi
     */
    public function organization()
    {
        $officials = VillageOfficial::where('is_active', true)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->get();
                    
        // Debug: Log data yang diambil
        \Illuminate\Support\Facades\Log::info('Officials Data:', [
            'count' => $officials->count(),
            'data' => $officials->toArray()
        ]);
                    
        return view('components.home.organization', compact('officials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VillageOfficial $villageOfficial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VillageOfficial $villageOfficial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillageOfficial $villageOfficial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VillageOfficial $villageOfficial)
    {
        //
    }
}
