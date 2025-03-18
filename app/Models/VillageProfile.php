<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name',
        'village_head',
        'address',
        'phone',
        'email',
        'vision',
        'mission',
        'description',
        'logo',
        'history',
        'structure_image'
    ];

    // Method untuk mendapatkan URL logo
    public function getLogoUrlAttribute()
    { 
        return $this->logo ? Storage::url($this->logo) : null;
    }
}
