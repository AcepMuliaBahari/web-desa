<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    protected $fillable = [
        'pendapatan',
        'dana_desa',
        'pad',
        'bantuan',
        'belanja',
        'belanja_pembangunan',
        'belanja_operasional',
        'belanja_takterduga',
        'dokumen_url',
        'tahun'
    ];
}