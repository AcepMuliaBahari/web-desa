<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ComplaintController extends Controller
{
    public function print(Complaint $complaint = null)
    {
        $complaints = $complaint->exists ? [$complaint] : Complaint::all();

        $pdf = Pdf::loadView('admin.complaints.print', compact('complaints'));
        return $pdf->stream('laporan-pengaduan.pdf');
    }

    public function index(Request $request)
    {
        $query = Complaint::with('citizen')->latest();

        // Filter by status if provided
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $complaints = $query->paginate(10);
        return view('admin.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function respond(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'response' => 'required|string',
            'status' => 'required|in:processed,resolved'
        ]);

        $complaint->update($validated);

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Tanggapan berhasil dikirim');
    }

    public function update(Request $request, Complaint $complaint)
    {
        // Admin tidak boleh update pengaduan langsung, hanya respond
        return redirect()->route('admin.complaints.show', $complaint)
            ->with('error', 'Admin tidak dapat mengedit pengaduan secara langsung.');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Pengaduan berhasil dihapus');
    }
}
