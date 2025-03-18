<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class Idm extends Model
{
    protected $fillable = [
        'skor',
        'status',
        'sosial',
        'ekonomi',
        'lingkungan',
        'tahun'
    ];
}