<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $complaints = Complaint::with('citizen')
                ->latest()
                ->paginate(10);
            return view('admin.complaints.index', compact('complaints'));
        } else {
            $complaints = Complaint::with('citizen')
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);
            return view('user.complaints.index', compact('complaints'));
        }
    }

    public function show(Complaint $complaint)
    {
        if (auth()->user()->role === 'admin') {
            return view('admin.complaints.show', compact('complaint'));
        } else {
            // Ensure user can only view their own complaints
            if ($complaint->user_id !== auth()->id()) {
                abort(403, 'Unauthorized action.');
            }
            return view('user.complaints.show', compact('complaint'));
        }
    }



    public function update(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'response' => 'required|string',
            'status' => 'required|in:pending,processed,resolved'
        ]);

        $complaint->update($validated);

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Tanggapan pengaduan berhasil disimpan');
    }

    public function create()
    {
        return view('user.complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|string|max:255',
            'citizen_id' => 'nullable|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'complaint_type' => 'required|string',
            'incident_location' => 'required|string|max:255',
            'incident_date' => 'required|date',
            'incident_time' => 'nullable|date_format:H:i',
            'evidence_file' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'document_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120'
        ]);

        $evidenceFilePath = null;
        $documentFilePath = null;

        if ($request->hasFile('evidence_file')) {
            $evidenceFilePath = $request->file('evidence_file')->store('complaints/evidence', 'public');
           
        }

        if ($request->hasFile('document_file')) {
            $documentFilePath = $request->file('document_file')->store('complaints/documents', 'public');
        }

        Complaint::create([
            'citizen_id' => $validated['citizen_id'] ?? null,
            'user_id' => auth()->id(),
            'reporter_name' => $validated['reporter_name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'complaint_type' => $validated['complaint_type'],
            'incident_location' => $validated['incident_location'],
            'incident_date' => $validated['incident_date'],
            'incident_time' => $validated['incident_time'],
            'evidence_file_path' => $evidenceFilePath,
            'document_file_path' => $documentFilePath,
            'status' => 'pending'
        ]);

        return redirect()->route('complaints.index')
            ->with('success', 'Pengaduan berhasil dikirim');
    }

    public function edit(Complaint $complaint)
{
    // Pastikan user hanya bisa edit miliknya sendiri dan masih pending
    if ($complaint->user_id !== auth()->id() || $complaint->status !== 'pending') {
        abort(403, 'Unauthorized action.');
    }

    return view('user.complaints.edit', compact('complaint'));
}

public function updateUser(Request $request, Complaint $complaint)
{
    if ($complaint->user_id !== auth()->id() || $complaint->status !== 'pending') {
        abort(403, 'Unauthorized action.');
    }

    $validated = $request->validate([
        'reporter_name' => 'required|string|max:255',
        'address' => 'required|string',
        'phone' => 'nullable|string|max:15',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'complaint_type' => 'required|string',
        'incident_location' => 'required|string|max:255',
        'incident_date' => 'required|date',
        'incident_time' => 'nullable|date_format:H:i',
        'evidence_file' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'document_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120'
    ]);

    if ($request->hasFile('evidence_file')) {
        $validated['evidence_file_path'] = $request->file('evidence_file')->store('complaints/evidence', 'public');
    }

    if ($request->hasFile('document_file')) {
        $validated['document_file_path'] = $request->file('document_file')->store('complaints/documents', 'public');
    }

    $complaint->update($validated);

    return redirect()->route('complaints.index')
        ->with('success', 'Pengaduan berhasil diperbarui');
}


    

    // public function destroy(Complaint $complaint)
    // {
    //     $complaint->delete();
    //     return redirect()->route('admin.complaints.index')
    //         ->with('success', 'Pengaduan berhasil dihapus');
    // }

    public function destroy(Complaint $complaint)
{
    if (auth()->user()->role === 'admin') {
        // Admin bisa hapus semua pengaduan
        $complaint->delete();

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Pengaduan berhasil dihapus oleh admin.');
    } else {
        // User hanya boleh hapus pengaduannya sendiri
        if ($complaint->user_id !== auth()->id()) {
            abort(403, 'Anda tidak punya izin untuk menghapus pengaduan ini.');
        }

        $complaint->delete();

        return redirect()->route('complaints.index')
            ->with('success', 'Pengaduan Anda berhasil dihapus.');
    }
}





}
