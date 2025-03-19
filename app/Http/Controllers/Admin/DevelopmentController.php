<?php

namespace App\Http\Controllers\Admin;

use App\Models\Development;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 

class DevelopmentController extends Controller
{
    public function index()
    {
        $developments = Development::latest()->paginate(10);
        return view('admin.developments.index', compact('developments'));
    }

    public function create()
    {
        $statuses = Development::getStatuses();
        return view('admin.developments.form', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'budget' => 'required|numeric|min:0',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string|in:' . implode(',', Development::getStatuses()),
            'location' => 'required|string',
            'pic_name' => 'required|string|max:255',
            'pic_contact' => 'required|string|max:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Tambahkan validasi foto
        ]);

        // Handle upload foto
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('developments', 'public');
            $validated['photo'] = $path;
        }

        Development::create($validated);

        return redirect()
            ->route('admin.developments.index')
            ->with('success', 'Pembangunan berhasil ditambahkan');
    }

    public function show(Development $development)
    {
        return view('admin.developments.show', compact('development'));
    }

    public function edit(Development $development)
    {
        $statuses = Development::getStatuses();
        return view('admin.developments.form', compact('development', 'statuses'));
    }

    public function update(Request $request, Development $development)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'budget' => 'required|numeric|min:0',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string|in:' . implode(',', Development::getStatuses()),
            'location' => 'required|string',
            'pic_name' => 'required|string|max:255',
            'pic_contact' => 'required|string|max:20',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Ubah menjadi sometimes untuk update
        ]);

        // Handle update foto
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($development->photo) {
                $oldPhoto = str_replace('/storage', 'public', $development->photo);
                Storage::delete($oldPhoto);
            }
            
            $path = $request->file('photo')->store('public/developments');
            $validated['photo'] = Storage::url($path);
        }

        $development->update($validated);

        return redirect()
            ->route('admin.developments.index')
            ->with('success', 'Pembangunan berhasil diperbarui');
    }

    public function destroy(Development $development)
    {
        // Hapus foto saat menghapus data
        if ($development->photo) {
            $oldPhoto = str_replace('/storage', 'public', $development->photo);
            Storage::delete($oldPhoto);
        }

        $development->delete();

        return redirect()
            ->route('admin.developments.index')
            ->with('success', 'Pembangunan berhasil dihapus');
    }
}