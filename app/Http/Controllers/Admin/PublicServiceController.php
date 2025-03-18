<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicService;
use App\Http\Requests\PublicServiceRequest;

class PublicServiceController extends Controller
{
    public function index()
    {
        $services = PublicService::latest()->get();
        return view('admin.public-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.public-services.form');
    }

    public function store(PublicServiceRequest $request)
    {
        PublicService::create($request->validated());
        return redirect()->route('admin.public-services.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function show(PublicService $publicService)
    {
        return view('admin.public-services.show', compact('publicService'));
    }

    public function edit(PublicService $publicService)
    {
        return view('admin.public-services.form', compact('publicService'));
    }

    public function update(PublicServiceRequest $request, PublicService $publicService)
    {
        $publicService->update($request->validated());
        return redirect()->route('admin.public-services.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(PublicService $publicService)
    {
        $publicService->delete();
        return redirect()->route('admin.public-services.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
} 