<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Umkm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'owner_name',
        'contact',
        'address',
        'category',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::disk('public')->url($this->image);
        }
        return asset('images/placeholder.jpg');
    }

    // Method untuk menghapus file dari storage saat model dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($umkm) {
            if ($umkm->isForceDeleting()) {
                Storage::disk('public')->delete($umkm->image);
            }
        });
    }
}
