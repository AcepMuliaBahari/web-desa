<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    protected $fillable = [
        'citizen_id',
        'user_id',
        'title',
        'reporter_name',
        'address',
        'phone',
        'content',
        'complaint_type',
        'incident_location',
        'incident_date',
        'incident_place',
        'incident_time',
        'status',
        'response',
        'category',
        'file_path',
        'evidence_file_path',
        'document_file_path'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'incident_date' => 'date',
        'incident_time' => 'datetime'
    ];

    // Relasi dengan Citizen
    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    // Relasi dengan User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
