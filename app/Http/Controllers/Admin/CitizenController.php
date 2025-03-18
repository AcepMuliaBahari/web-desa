<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use App\Http\Requests\CitizenRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CitizensExport;
use App\Imports\CitizensImport;
use PDF;

class CitizenController extends Controller
{
    public function index(Request $request)
    {
        $query = Citizen::query();

        // Pencarian berdasarkan nama atau NIK
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('nik', 'like', "%{$searchTerm}%")
                  ->orWhere('no_kk', 'like', "%{$searchTerm}%");
            });
        }

        // Filter berdasarkan RT
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        // Filter berdasarkan RW
        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        // Filter berdasarkan jenis kelamin
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter berdasarkan agama
        if ($request->filled('agama')) {
            $query->where('agama', $request->agama);
        }

        // Filter berdasarkan status perkawinan
        if ($request->filled('status_perkawinan')) {
            $query->where('status_perkawinan', $request->status_perkawinan);
        }

        // Filter berdasarkan pendidikan
        if ($request->filled('pendidikan')) {
            $query->where('pendidikan', $request->pendidikan);
        }

        // Filter berdasarkan rentang umur
        if ($request->filled(['usia_dari', 'usia_sampai'])) {
            $today = now();
            $from = $today->copy()->subYears($request->usia_sampai);
            $to = $today->copy()->subYears($request->usia_dari);
            
            $query->whereBetween('tanggal_lahir', [$from, $to]);
        }

        $citizens = $query->latest()->paginate(10);
        
        // Data untuk dropdown filter
        $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $statusList = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        $pendidikanList = ['Tidak/Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'];

        return view('admin.citizens.index', compact(
            'citizens',
            'agamaList',
            'statusList',
            'pendidikanList'
        ));
    }

    public function show(Citizen $citizen){
        return view('admin.citizens.show', compact('citizen'));
    }

    public function create()
    {
        return view('admin.citizens.form');
    }

    public function store(CitizenRequest $request)
    {
        $validated = $request->validated();
        
        // Format RT dan RW menjadi 3 digit
        $validated['rt'] = str_pad($validated['rt'], 3, '0', STR_PAD_LEFT);
        $validated['rw'] = str_pad($validated['rw'], 3, '0', STR_PAD_LEFT);
        
        Citizen::create($validated);

        return redirect()->route('admin.citizens.index')
            ->with('success', 'Data penduduk berhasil ditambahkan');
    }

    public function edit(Citizen $citizen)
    {
        return view('admin.citizens.form', compact('citizen'));
    }

    public function update(CitizenRequest $request, Citizen $citizen)
    {
        $validated = $request->validated();
        
        // Format RT dan RW menjadi 3 digit
        $validated['rt'] = str_pad($validated['rt'], 3, '0', STR_PAD_LEFT);
        $validated['rw'] = str_pad($validated['rw'], 3, '0', STR_PAD_LEFT);
        
        $citizen->update($validated);

        return redirect()->route('admin.citizens.index')
            ->with('success', 'Data penduduk berhasil diperbarui');
    }

    public function destroy(Citizen $citizen)
    {
        $citizen->delete();

        return redirect()->route('admin.citizens.index')
            ->with('success', 'Data penduduk berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new CitizensExport, 'data-penduduk-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        try {
            Excel::import(new CitizensImport, $request->file('file'));
            return redirect()->route('admin.citizens.index')->with('success', 'Data berhasil diimport');
        } catch (\Exception $e) {
            return redirect()->route('admin.citizens.index')->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    public function print()
    {
        $citizens = Citizen::all();
        $pdf = PDF::loadView('admin.citizens.print', compact('citizens'));
        
        // Atur orientasi landscape dan opsi lainnya
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);

        return $pdf->stream('data-penduduk-' . now()->format('Y-m-d') . '.pdf');
    }
} 