<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Accessor untuk URL file
    public function getFileUrlAttribute()
    {
        if ($this->file_path && Storage::disk('public')->exists($this->file_path)) {
            return Storage::disk('public')->url($this->file_path);
        }
        return asset('images/placeholder.jpg');
    }

    // Method untuk menghapus file dari storage saat model dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($gallery) {
            if ($gallery->isForceDeleting()) {
                Storage::disk('public')->delete($gallery->file_path);
            }
        });
    }
}
