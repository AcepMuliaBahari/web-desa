<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Development extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'budget',
        'progress',
        'status',
        'location',
        'pic_name',
        'pic_contact',
    ];

    public static function getStatuses()
    {
        return [
            'Belum Dimulai',
            'Proses', 
            'Selesai',
            'Tertunda'
        ];
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'budget' => 'decimal:2',
        'progress' => 'integer',
    ];
} 