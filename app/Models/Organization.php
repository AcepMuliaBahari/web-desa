<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'photo',
        'description',
        'contact_phone',
        'contact_email',
        'position',
        'is_active',
        'parent_id',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'position' => 'integer',
        'parent_id' => 'integer'
    ];

    // Relasi untuk struktur hierarki
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Organization::class, 'parent_id');
    }

    // Accessor untuk foto
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        return asset('images/default-organization.png');
    }

    // Scope untuk mendapatkan root organizations (tanpa parent)
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    // Scope untuk mendapatkan active organizations
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan posisi
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('id');
    }
}
