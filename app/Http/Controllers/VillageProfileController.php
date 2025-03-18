<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        return view('profile.index', compact('profile'));
    }

    public function structure()
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        return view('admin.village-profile.structure', compact('profile'));
    }

    public function updateStructure(Request $request)
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        
        $request->validate([
            'structure_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('structure_image')) {
            // Hapus gambar lama jika ada
            if ($profile->structure_image) {
                Storage::delete($profile->structure_image);
            }
            
            $path = $request->file('structure_image')->store('public/village-profile');
            $profile->structure_image = str_replace('public/', '', $path);
        }

        $profile->save();

        return redirect()
            ->route('admin.village-profile.structure')
            ->with('success', 'Struktur organisasi berhasil diperbarui');
    }

    public function visionMission()
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        return view('admin.village-profile.vision-mission', compact('profile'));
    }

    public function updateVisionMission(Request $request)
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        $profile->vision = $request->vision;
        $profile->mission = $request->mission;
        $profile->save();

        return redirect()
            ->route('admin.village-profile.vision-mission')
            ->with('success', 'Visi & Misi berhasil diperbarui');
    }
} 