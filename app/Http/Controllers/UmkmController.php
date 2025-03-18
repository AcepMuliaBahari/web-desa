<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::query()
            ->when(request('search'), function($query) {
                $query->where('name', 'like', '%'.request('search').'%')
                      ->orWhere('description', 'like', '%'.request('search').'%');
            })
            ->when(request('category'), function($query) {
                $query->where('category', request('category'));
            })
            ->where('is_active', true)
            ->latest()
            ->paginate(9);
    
        return view('umkm.index', compact('umkm'));
    }
    
    public function show(Umkm $umkm)
    {
        if (!$umkm->is_active) {
            abort(404);
        }
        
        return view('umkm.show', compact('umkm'));
    }
}
