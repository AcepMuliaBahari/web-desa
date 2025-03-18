<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicService extends Model
{
    protected $fillable = [
        'service_name',
        'description',
        'category',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
