<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Data Penduduk
        $totalPendudukData = [
            'laki_laki' => 800,
            'perempuan' => 700,
            'usia_0_14' => 300,
            'usia_15_64' => 1000,
            'usia_65_plus' => 200,
            'pendidikan_sd' => 400,
            'pendidikan_smp' => 300,
            'pendidikan_sma' => 500,
            'pendidikan_pt' => 300,
        ];
        $totalPenduduk = 1500;

        // Data APBDes
        $apbdesData = [
            'pendapatan' => 10000000000,
            'dana_desa' => 8000000000,
            'pad' => 1000000000,
            'bantuan' => 1000000000,
            'belanja' => 9500000000,
            'belanja_pembangunan' => 5000000000,
            'belanja_operasional' => 4000000000,
            'belanja_takterduga' => 500000000,
            'dokumen_url' => '/storage/documents/apbdes-2024.pdf'
        ];

        // Data Status IDM
        $statusIdmData = [
            'skor' => 0.7234,
            'status' => 'Berkembang',
            'sosial' => 75.5,
            'ekonomi' => 68.2,
            'lingkungan' => 73.4
        ];

        // Data Status SDGs
        $statusSdgsData = [
            'goals' => [
                ['nomor' => 1, 'nama' => 'Tanpa Kemiskinan', 'status' => 'Dalam Proses', 'persentase' => 75],
                ['nomor' => 2, 'nama' => 'Tanpa Kelaparan', 'status' => 'Tercapai', 'persentase' => 90],
                // Tambahkan goals lainnya
            ],
            'summary' => [
                'tercapai' => 5,
                'dalam_proses' => 8,
                'belum_tercapai' => 4
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