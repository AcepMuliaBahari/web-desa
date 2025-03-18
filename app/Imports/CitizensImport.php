<?php

namespace App\Imports;

use App\Models\Citizen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CitizensImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {   
        // Konversi nilai eksponensial ke string biasa
    $nik = number_format($row['nik'], 0, '', '');
    $no_kk = number_format($row['no_kk'], 0, '', '');
        return new Citizen([
            'nik' => $row['nik'],
            'no_kk' => $row['no_kk'],
            'name' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'rt' => str_pad($row['rt'], 3, '0', STR_PAD_LEFT),
            'rw' => str_pad($row['rw'], 3, '0', STR_PAD_LEFT),
            'agama' => $row['agama'],
            'status_perkawinan' => $row['status_perkawinan'],
            'pekerjaan' => $row['pekerjaan'],
            'kewarganegaraan' => $row['kewarganegaraan'],
            'pendidikan' => $row['pendidikan']
        ]);
    }

    public function rules(): array
    {
        return [
            'nik' => 'required|string|size:16|unique:citizens,nik',
            'no_kk' => 'required|string|size:16',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'pendidikan' => 'required|in:Tidak/Belum Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,D1,D2,D3,D4/S1,S2,S3'
        ];
    }
} 