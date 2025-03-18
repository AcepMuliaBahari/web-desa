<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'photo',
        'slug',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function webPage()
    {
        return $this->belongsTo(WebPage::class);
    }

    // Accessor untuk URL foto
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    // Scope untuk berita terbaru
    public function scopeLatestNews($query, $limit = 5)
    {
        return $query->latest()->take($limit);
    }

    // Scope untuk berita berdasarkan kategori
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Generate slug before saving
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }
}
