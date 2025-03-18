<?php

namespace App\Http\Controllers;

use App\Models\PublicService;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function index()
    {
        $services = PublicService::where('is_active', true)->get();
        return view('frontend.public-services.index', compact('services'));
    }

    public function show($id)
    {
        $service = PublicService::where('is_active', true)->findOrFail($id);
        return view('frontend.public-services.show', compact('service'));
    }
}

