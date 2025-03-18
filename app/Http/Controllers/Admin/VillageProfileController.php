<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use App\Http\Requests\VillageProfileRequest;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();
        return view('admin.village-profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = VillageProfile::first();
        return view('admin.village-profile.form', compact('profile'));
    }

    public function update(VillageProfileRequest $request)
    {
        $profile = VillageProfile::first();
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($profile && $profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $path = $request->file('logo')->store('village-profile', 'public');
            $validated['logo'] = $path;
        }

        if ($profile) {
            $profile->update($validated);
        } else {
            VillageProfile::create($validated);
        }

        return redirect()->route('admin.village-profile.index')
            ->with('success', 'Profil desa berhasil diperbarui');
    }
} 