<?php

namespace App\Imports;

use App\Models\VillageRegulation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegulationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new VillageRegulation([
            'title' => $row['judul'],
            'number' => $row['nomor'],
            'type' => $row['tipe'],
            'category' => $row['kategori'],
            'date_enacted' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_disahkan']),
            'description' => $row['deskripsi'] ?? null,
            'is_published' => $row['status'] ?? true,
        ]);
    }
} 