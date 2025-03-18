<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Finance::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan tipe
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan tanggal
        if ($request->has('date_start') && $request->date_start != '') {
            $query->whereDate('date', '>=', $request->date_start);
        }
        if ($request->has('date_end') && $request->date_end != '') {
            $query->whereDate('date', '<=', $request->date_end);
        }

        $finances = $query->latest()->paginate(10);
        
        // Hitung total
        $totalBalance = Finance::calculateBalance();
        $totalIncome = Finance::getTotalIncome();
        $totalExpense = Finance::getTotalExpense();
        
        return view('admin.finances.index', compact('finances', 'totalBalance', 'totalIncome', 'totalExpense'));
    }

    public function create()
    {
        return view('admin.finances.form');
    }

    public function store(FinanceRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('finances', 'public');
            $validated['file_path'] = $path;
        }

        Finance::create($validated);

        return redirect()->route('admin.finances.index')
            ->with('success', 'Laporan keuangan berhasil ditambahkan');
    }

    public function show(Finance $finance)
    {
        return view('admin.finances.show', compact('finance'));
    }

    public function edit(Finance $finance)
    {
        return view('admin.finances.form', compact('finance'));
    }

    public function update(FinanceRequest $request, Finance $finance)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($finance->file_path) {
                Storage::disk('public')->delete($finance->file_path);
            }
            $path = $request->file('file')->store('finances', 'public');
            $validated['file_path'] = $path;
        }

        $finance->update($validated);

        return redirect()->route('admin.finances.index')
            ->with('success', 'Laporan keuangan berhasil diperbarui');
    }

    public function destroy(Finance $finance)
    {
        if ($finance->file_path) {
            Storage::disk('public')->delete($finance->file_path);
        }
        
        $finance->delete();

        return redirect()->route('admin.finances.index')
            ->with('success', 'Laporan keuangan berhasil dihapus');
    }

    public function download(Finance $finance)
    {
        if (!$finance->file_path || !Storage::disk('public')->exists($finance->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($finance->file_path);
    }
} 