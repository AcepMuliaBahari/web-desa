<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageRegulation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'number',
        'date_enacted',
        'file_path',
        'is_published'
    ];

    protected $casts = [
        'date_enacted' => 'date',
        'is_published' => 'boolean'
    ];

    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'perdes' => 'Peraturan Desa', 
            'perkades' => 'Peraturan Kepala Desa',
            'sk_kades' => 'SK Kepala Desa',
            'apbdes' => 'APBDes',
            'lainnya' => 'Lainnya',
            default => $this->category,
        };
    }

    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'produk_hukum' => 'Produk Hukum',
            'informasi_publik' => 'Informasi Publik',
            default => $this->type,
        };
    }
}
