<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\VillageOfficial;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::where('is_active', true)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->get();
        
        // Logging untuk debugging
        Log::info('Village Officials Data:', [
            'count' => $officials->count(),
            'data' => $officials->toArray()
        ]);
                    
        return view('organization.index', compact('officials'));
    }

    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organization.show', compact('organization'));
    }
}

