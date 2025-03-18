<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class Sdgs extends Model
{
    protected $fillable = [
        'goals',
        'summary',
        'tahun'
    ];

    protected $casts = [
        'goals' => 'array',
        'summary' => 'array'
    ];
}