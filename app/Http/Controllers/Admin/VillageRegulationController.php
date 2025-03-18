<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageRegulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageRegulationController extends Controller
{
    public function index()
    {
        $regulations = VillageRegulation::when(request('search'), function($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('number', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
        
        return view('admin.village-regulations.index', compact('regulations'));
    }

    public function create()
    {
        return view('admin.village-regulations.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:produk_hukum,informasi_publik',
            'category' => 'required|string|in:perdes,perkades,sk_kades,apbdes,lainnya',
            'number' => 'required|string|max:50',
            'date_enacted' => 'required|date',
            'file' => 'required|file|mimes:pdf|max:10240', // max 10MB
            'is_published' => 'boolean'
        ]);

       

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('regulations', 'public');
            $validated['file_path'] = $path;
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        VillageRegulation::create($validated);

        return redirect()
            ->route('admin.village-regulations.index')
            ->with('success', 'Regulasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $regulation = VillageRegulation::findOrFail($id);
        return view('admin.village-regulations.show', compact('regulation'));
    }

    public function edit($id)
    {   
        $regulation = VillageRegulation::findOrFail($id);
        return view('admin.village-regulations.form', compact('regulation'));
    }

    public function update(Request $request, VillageRegulation $regulation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:produk_hukum,informasi_publik',
            'category' => 'required|string|in:perdes,perkades,sk_kades,apbdes,lainnya',
            'number' => 'required|string|max:50',
            'date_enacted' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:10240', // max 10MB
            'is_published' => 'boolean'
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($regulation->file_path) {
                Storage::disk('public')->delete($regulation->file_path);
            }
            
            $path = $request->file('file')->store('regulations', 'public');
            $validated['file_path'] = $path;
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        $regulation->update($validated);

        return redirect()
            ->route('admin.village-regulations.index')
            ->with('success', 'Regulasi berhasil diperbarui');
    }

    public function destroy(VillageRegulation $regulation)
    {
        try {
            \Log::info('Menghapus regulasi dengan ID: ' . $regulation->id);
    
            // Hapus file jika ada
            if ($regulation->file_path && Storage::disk('public')->exists($regulation->file_path)) {
                \Log::info('Menghapus file: ' . $regulation->file_path);
                Storage::disk('public')->delete($regulation->file_path);
            }
    
            // Hapus data dari database
            $regulation->delete();
            \Log::info('Regulasi berhasil dihapus dari database.');
    
            return redirect()
                ->route('admin.village-regulations.index')
                ->with('success', 'Regulasi berhasil dihapus');
        } catch (\Exception $e) {
            \Log::error('Error saat menghapus regulasi: ' . $e->getMessage());
    
            return back()->with('error', 'Terjadi kesalahan saat menghapus regulasi');
        }
    }
    
    

    public function download(VillageRegulation $regulation)
    {
        // Verifikasi file path
        if (!$regulation->file_path || !Storage::disk('public')->exists($regulation->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }
        
        // Pastikan path dan isi file benar
        $filename = pathinfo($regulation->file_path, PATHINFO_FILENAME) . '.' . pathinfo($regulation->file_path, PATHINFO_EXTENSION);
        return Storage::disk('public')->download($regulation->file_path, $filename);
    }
} 