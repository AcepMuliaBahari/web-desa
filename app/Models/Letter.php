<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Letter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'citizen_id',
        'letter_type',
        'reference_number',
        'purpose',
        'lampiran',
        'description',
        'attachment',
        'status',
        'rejection_reason',
        'approved_at',
        'approved_by'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    // Relasi ke citizen
    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    // Relasi ke user yang menyetujui
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Scope untuk filter berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('reference_number', 'like', "%{$search}%")
              ->orWhere('purpose', 'like', "%{$search}%")
              ->orWhereHas('citizen', function($q) use ($search) {
                  $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
              });
        });
    }
}
