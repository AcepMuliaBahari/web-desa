<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::when(request('search'), function($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('owner_name', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
        
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'owner_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string',
            'category' => 'required|string|max:50',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('umkm', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Umkm::create($validated);

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan');
    }

    public function show(Umkm $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.form', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'owner_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'address' => 'required|string',
            'category' => 'required|string|max:50',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($umkm->image) {
                Storage::disk('public')->delete($umkm->image);
            }
            $path = $request->file('image')->store('umkm', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $umkm->update($validated);

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diperbarui');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->image) {
            Storage::disk('public')->delete($umkm->image);
        }
        
        $umkm->delete();

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus');
    }
} 