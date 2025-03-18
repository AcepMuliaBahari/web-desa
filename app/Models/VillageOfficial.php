<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillageOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'description',
        'phone',
        'email',
        'period_start',
        'period_end',
        'order',
        'is_active'
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end' => 'date',
        'is_active' => 'boolean',
    ];

    // Accessor untuk URL foto
    public function getPhotoUrlAttribute()
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        return asset('images/sotk/user.png');
    }

    // Scope untuk mendapatkan pejabat aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan order
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('id');
    }
}
