<?php

namespace App\Http\Controllers;

use App\Models\VillageRegulation;
use Illuminate\Support\Facades\Storage;

class VillageRegulationController extends Controller
{
    public function publicIndex()
    {
        $regulations = VillageRegulation::where('is_published', true)
            ->latest()
            ->paginate(12);
            
        return view('regulations.index', compact('regulations'));
    }

    public function publicShow(VillageRegulation $regulation)
    {
        if (!$regulation->is_published) {
            abort(404);
        }

        return view('regulations.show', compact('regulation'));
    }

    public function publicDownload(VillageRegulation $regulation)
    {
        if (!$regulation->is_published || !$regulation->file_path || !Storage::disk('public')->exists($regulation->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        $filename = pathinfo($regulation->file_path, PATHINFO_FILENAME) . '.' . pathinfo($regulation->file_path, PATHINFO_EXTENSION);
        return Storage::disk('public')->download($regulation->file_path, $filename);
    }
}

