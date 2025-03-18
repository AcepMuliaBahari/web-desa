<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4|max:10240',
            'is_active' => 'boolean'
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Simpan file ke storage/app/public/galleries
                $file->storeAs('galleries', $fileName, 'public');
                
                Gallery::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'type' => $request->type,
                    'file_path' => 'galleries/' . $fileName,
                    'is_active' => $request->is_active ?? true
                ]);

                return redirect()->route('admin.galleries.index')
                    ->with('success', 'Galeri berhasil ditambahkan');
            }
        } catch (\Exception $e) {
            \Log::error('Gallery Upload Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengunggah file');
        }
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4|max:10240',
            'is_active' => 'boolean'
        ]);

        try {
            $data = $request->except('file');

            if ($request->hasFile('file')) {
                // Hapus file lama
                Storage::disk('public')->delete($gallery->file_path);

                // Upload file baru
                $file = $request->file('file');
                $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                $file->storeAs('galleries', $fileName, 'public');
                
                $data['file_path'] = 'galleries/' . $fileName;
            }

            $gallery->update($data);

            return redirect()->route('admin.galleries.index')
                ->with('success', 'Galeri berhasil diperbarui');
        } catch (\Exception $e) {
            \Log::error('Gallery Update Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui galeri');
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {
            // Hapus file dari storage
            Storage::disk('public')->delete($gallery->file_path);
            
            // Hapus record dari database
            $gallery->delete();

            return redirect()->route('admin.galleries.index')
                ->with('success', 'Galeri berhasil dihapus');
        } catch (\Exception $e) {
            \Log::error('Gallery Delete Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus galeri');
        }
    }
} 