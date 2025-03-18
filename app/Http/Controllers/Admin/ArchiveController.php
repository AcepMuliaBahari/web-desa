<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Http\Requests\ArchiveRequest;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::latest()->get();
        return view('admin.archives.index', compact('archives'));
    }

    public function create()
    {
        return view('admin.archives.form');
    }

    public function store(ArchiveRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('archives', 'public');
        }

        Archive::create($data);
        return redirect()->route('admin.archives.index')
            ->with('success', 'Arsip berhasil ditambahkan');
    }

    public function show(Archive $archive)
    {
        return view('admin.archives.show', compact('archive'));
    }

    public function edit(Archive $archive)
    {
        return view('admin.archives.form', compact('archive'));
    }

    public function update(ArchiveRequest $request, Archive $archive)
    {
        $data = $request->validated();
        
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($archive->file_path && Storage::disk('public')->exists($archive->file_path)) {
                Storage::disk('public')->delete($archive->file_path);
            }
            $data['file_path'] = $request->file('file')->store('archives', 'public');
        }

        $archive->update($data);
        return redirect()->route('admin.archives.index')
            ->with('success', 'Arsip berhasil diperbarui');
    }

    public function destroy(Archive $archive)
    {
        // Hapus file
        if ($archive->file_path && Storage::disk('public')->exists($archive->file_path)) {
            Storage::disk('public')->delete($archive->file_path);
        }

        $archive->delete();
        return redirect()->route('admin.archives.index')
            ->with('success', 'Arsip berhasil dihapus');
    }

    public function download(Archive $archive)
    {
        if (!Storage::disk('public')->exists($archive->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($archive->file_path);
    }
} 