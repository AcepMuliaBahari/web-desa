<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
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

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect()->route('admin.complaints.index')
            ->with('success', 'Pengaduan berhasil dihapus');
    }
}
