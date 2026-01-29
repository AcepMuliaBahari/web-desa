<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistics\{
    Population,
    Apbdes,
    Idm,
    Sdgs,
};

class AdminStatisticsController extends Controller
{
    public function index()
    {
        $totalPenduduk = Population::sum('laki_laki') + Population::sum('perempuan');
        $totalApbdes = Apbdes::where('tahun', date('Y'))->sum('pendapatan');
        $statusIdm = Idm::where('tahun', date('Y'))->first()->status ?? 'Belum ada data';
        $totalGoalsTercapai = Sdgs::where('tahun', date('Y'))->first()->summary['tercapai'] ?? 0;

        return view('admin.statistics.index', compact('totalPenduduk', 'totalApbdes', 'statusIdm', 'totalGoalsTercapai'));
    }

    public function penduduk()
    {
        $data = Population::first();
        return view('admin.statistics.penduduk', compact('data'));
    }

    public function updatePenduduk(Request $request)
    {
        $validated = $request->validate([
            'laki_laki' => 'required|integer',
            'perempuan' => 'required|integer',
            'usia_0_14' => 'required|integer',
            'usia_15_64' => 'required|integer',
            'usia_65_plus' => 'required|integer',
            'pendidikan_sd' => 'required|integer',
            'pendidikan_smp' => 'required|integer',
            'pendidikan_sma' => 'required|integer',
            'pendidikan_pt' => 'required|integer',
        ]);

        Population::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('admin.statistics.penduduk')
            ->with('success', 'Data penduduk berhasil diperbarui');
    }

    public function apbdes()
    {
        $data = Apbdes::where('tahun', date('Y'))->first();
        return view('admin.statistics.apbdes', compact('data'));
    } 

    public function updateApbdes(Request $request)
    {
        $validated = $request->validate([
            'pendapatan' => 'required|numeric',
            'dana_desa' => 'required|numeric',
            'pad' => 'required|numeric',
            'bantuan' => 'required|numeric',
            'belanja' => 'required|numeric', 
            'belanja_pembangunan' => 'required|numeric',
            'belanja_operasional' => 'required|numeric',
            'belanja_takterduga' => 'required|numeric',
            'dokumen' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            $apbdes = Apbdes::where('tahun', date('Y'))->first();
            if ($apbdes && $apbdes->dokumen_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $apbdes->dokumen_url));
            }
            $path = $request->file('dokumen')->store('documents', 'public');
            $validated['dokumen_url'] = Storage::url($path);
        } 

        $validated['tahun'] = date('Y');

        Apbdes::updateOrCreate(
            ['tahun' => date('Y')],
            $validated
        );

        return redirect()->route('admin.statistics.apbdes')
            ->with('success', 'Data APBDes berhasil diperbarui');
    }

    public function idm()
    {
        $data = Idm::where('tahun', date('Y'))->first();
        return view('admin.statistics.idm', compact('data'));
    }

    public function updateIdm(Request $request)
    {
        $validated = $request->validate([
            'skor' => 'required|numeric|between:0,1',
            'status' => 'required|in:Mandiri,Berkembang,Tertinggal,Sangat Tertinggal',
            'sosial' => 'required|numeric|between:0,100',
            'ekonomi' => 'required|numeric|between:0,100',
            'lingkungan' => 'required|numeric|between:0,100',
        ]);

        $validated['tahun'] = date('Y');

        Idm::updateOrCreate(
            ['tahun' => date('Y')],
            $validated
        );

        return redirect()->route('admin.statistics.idm')
            ->with('success', 'Data IDM berhasil diperbarui');
    }

                public function sdgs()
            {
                $data = Sdgs::where('tahun', date('Y'))->first();
                return view('admin.statistics.sdgs', compact('data'));
            }

            public function updateSdgs(Request $request)
            {
                $validated = $request->validate([
                    'goals' => 'required|array',
                    'goals.*.nomor' => 'required|integer|between:1,17',
                    'goals.*.nama' => 'required|string',
                    'goals.*.status' => 'required|in:Tercapai,Dalam Proses,Belum Tercapai',
                    'goals.*.persentase' => 'required|numeric|between:0,100',
                ]);

                $summary = [
                    'tercapai' => collect($validated['goals'])->where('status', 'Tercapai')->count(),
                    'dalam_proses' => collect($validated['goals'])->where('status', 'Dalam Proses')->count(),
                    'belum_tercapai' => collect($validated['goals'])->where('status', 'Belum Tercapai')->count(),
                ];

                Sdgs::updateOrCreate(
                    ['tahun' => date('Y')],
                    [
                        'goals' => $validated['goals'],
                        'summary' => $summary,
                        'tahun' => date('Y')
                    ]
                );

                return redirect()->route('admin.statistics.sdgs')
                    ->with('success', 'Data SDGs berhasil diperbarui');
                }
}
