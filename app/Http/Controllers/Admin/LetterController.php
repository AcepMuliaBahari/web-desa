<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index(Request $request)
    {
        $query = Letter::with('citizen')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('reference_number', 'like', "%{$search}%")
                  ->orWhere('letter_type', 'like', "%{$search}%")
                  ->orWhere('purpose', 'like', "%{$search}%")
                  ->orWhereHas('citizen', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                  });
            });
        }

        $letters = $query->paginate(10);
        return view('admin.letters.index', compact('letters'));
    }

    public function create()
    {
        $citizens = Citizen::all();
        return view('admin.letters.form', compact('citizens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'citizen_id' => 'required|exists:citizens,id',
            'letter_type' => 'required|string|max:50',
            'reference_number' => 'required|string|max:50|unique:letters',
            'purpose' => 'required|string|max:255',
            'lampiran' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('letters', 'public');
            $validated['attachment'] = $path;
        }

        Letter::create($validated);

        return redirect()
            ->route('admin.letters.index')
            ->with('success', 'Surat berhasil ditambahkan');
    }

    public function show(Letter $letter)
    {
        return view('admin.letters.show', compact('letter'));
    }

    public function edit(Letter $letter)
    {
        $citizens = Citizen::all();
        return view('admin.letters.form', compact('letter', 'citizens'));
    }

    public function update(Request $request, Letter $letter)
    {
        $validated = $request->validate([
            'citizen_id' => 'required|exists:citizens,id',
            'letter_type' => 'required|string|max:50',
            'reference_number' => 'required|string|max:50|unique:letters,reference_number,' . $letter->id,
            'purpose' => 'required|string|max:255',
            'lampiran' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        if ($request->hasFile('attachment')) {
            // Hapus file lama jika ada
            if ($letter->attachment) {
                Storage::disk('public')->delete($letter->attachment);
            }
            
            $path = $request->file('attachment')->store('letters', 'public');
            $validated['attachment'] = $path;
        }

        $letter->update($validated);

        return redirect()
            ->route('admin.letters.index')
            ->with('success', 'Surat berhasil diperbarui');
    }

    public function destroy(Letter $letter)
    {
        if ($letter->attachment) {
            Storage::disk('public')->delete($letter->attachment);
        }
        
        $letter->delete();

        return redirect()
            ->route('admin.letters.index')
            ->with('success', 'Surat berhasil dihapus');
    }

    public function download(Letter $letter)
    {
        if (!$letter->attachment || !Storage::disk('public')->exists($letter->attachment)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($letter->attachment);
    }
} 