<?php

namespace App\Http\Controllers;

use App\Models\VillageRegulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulationController extends Controller
{
    public function index()
    {
        $regulations = VillageRegulation::where('is_published', true)
            ->when(request('search'), function($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('number', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
        
        return view('regulations.index', compact('regulations'));
    }

    public function show($id)
    {
        $regulation = VillageRegulation::where('is_published', true)
            ->findOrFail($id);
            
        return view('regulations.show', compact('regulation'));
    }

    public function download($id)
    {
        $regulation = VillageRegulation::where('is_published', true)
            ->findOrFail($id);

        if (!$regulation->file_path || !Storage::disk('public')->exists($regulation->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        $filename = pathinfo($regulation->file_path, PATHINFO_FILENAME) . '.' . pathinfo($regulation->file_path, PATHINFO_EXTENSION);
        return Storage::disk('public')->download($regulation->file_path, $filename);
    }
}