<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    protected $fillable = [
        'citizen_id',
        'content',
        'status',
        'response',
        'category'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relasi dengan Citizen
    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    // Scope untuk filter berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk pengaduan yang belum ditanggapi
    public function scopeUnresponded($query)
    {
        return $query->whereNull('response');
    }

    // Accessor untuk format status yang lebih readable
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'processed' => 'Diproses',
            'resolved' => 'Selesai',
            default => 'Tidak Diketahui'
        };
    }
}
