<?php

namespace App\Exports;

use App\Models\Citizen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CitizensExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Citizen::all();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'No KK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'RT',
            'RW',
            'Agama',
            'Status Perkawinan',
            'Pekerjaan',
            'Kewarganegaraan',
            'Pendidikan'
        ];
    }

    public function map($citizen): array
    {
        return [
            $citizen->nik,
            $citizen->no_kk,
            $citizen->name,
            $citizen->tempat_lahir,
            $citizen->tanggal_lahir->format('Y-m-d'),
            $citizen->jenis_kelamin,
            $citizen->alamat,
            $citizen->rt,
            $citizen->rw,
            $citizen->agama,
            $citizen->status_perkawinan,
            $citizen->pekerjaan,
            $citizen->kewarganegaraan,
            $citizen->pendidikan
        ];
    }
} 