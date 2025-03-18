<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    protected $fillable = [
        'laki_laki',
        'perempuan',
        'usia_0_14',
        'usia_15_64',
        'usia_65_plus',
        'pendidikan_sd',
        'pendidikan_smp',
        'pendidikan_sma',
        'pendidikan_pt',
    ];
}