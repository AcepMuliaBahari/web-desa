<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Statistics\Population; 
use App\Models\Statistics\Apbdes; 
use App\Models\Statistics\Idm;
use App\Models\Statistics\Sdgs;


class StatisticsController extends Controller
{
    public function index()
    {
        // Fetching Data Penduduk from the Population model
        $populationData = Population::first();
        $totalPendudukData = [
            'laki_laki' => $populationData->laki_laki ?? 0,
            'perempuan' => $populationData->perempuan ?? 0,
            'usia_0_14' => $populationData->usia_0_14 ?? 0,
            'usia_15_64' => $populationData->usia_15_64 ?? 0,
            'usia_65_plus' => $populationData->usia_65_plus ?? 0,
            'pendidikan_sd' => $populationData->pendidikan_sd ?? 0,
            'pendidikan_smp' => $populationData->pendidikan_smp ?? 0,
            'pendidikan_sma' => $populationData->pendidikan_sma ?? 0,
            'pendidikan_pt' => $populationData->pendidikan_pt ?? 0,
        ];
        $totalPenduduk = $populationData->laki_laki + $populationData->perempuan; // Calculate total population

        // Fetching Data APBDes from the Apbdes model
        $apbdes = Apbdes::where('tahun', date('Y'))->first();
        $apbdesData = [
            'pendapatan' => $apbdes->pendapatan ?? 0,
            'dana_desa' => $apbdes->dana_desa ?? 0,
            'pad' => $apbdes->pad ?? 0,
            'bantuan' => $apbdes->bantuan ?? 0, 
            'belanja' => $apbdes->belanja ?? 0,
            'belanja_pembangunan' => $apbdes->belanja_pembangunan ?? 0,
            'belanja_operasional' => $apbdes->belanja_operasional ?? 0,
            'belanja_takterduga' => $apbdes->belanja_takterduga ?? 0,
            'dokumen_url' => $apbdes->dokumen_url ?? null
        ];

        // Fetching Data IDM from the Idm model
        $statusIdmData = Idm::where('tahun', date('Y'))->first();
        $statusIdmData = [
            'skor' => $statusIdmData->skor ?? 0,
            'status' => $statusIdmData->status ?? 'Tidak ada data',
            'sosial' => $statusIdmData->sosial ?? 0,
            'ekonomi' => $statusIdmData->ekonomi ?? 0,
            'lingkungan' => $statusIdmData->lingkungan ?? 0
        ];
 



            // Sdgs
            $sdgs = Sdgs::where('tahun', date('Y'))->first();

            $statusSdgsData = [
                'goals' => $sdgs->goals ?? [],
                'summary' => $sdgs->summary ?? [
                    'tercapai' => 0,
                    'dalam_proses' => 0,
                    'belum_tercapai' => 0
                ]
            ];

        return view('statistics.statistics', compact(
            'totalPenduduk',
            'totalPendudukData',
            'apbdesData',
            'statusIdmData',
            'statusSdgsData'
        ));
    }

}
