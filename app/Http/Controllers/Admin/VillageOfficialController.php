<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageOfficial;
use App\Http\Requests\VillageOfficialRequest;
use Illuminate\Support\Facades\Storage;

class VillageOfficialController extends Controller
{
    public function index()
    {
        $officials = VillageOfficial::ordered()->paginate(10);
        return view('admin.village-officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.village-officials.form');
    }

    public function store(VillageOfficialRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        VillageOfficial::create($data);
        
        return redirect()->route('admin.village-officials.index')
            ->with('success', 'Data pejabat berhasil ditambahkan');
    }

    public function edit(VillageOfficial $villageOfficial)
    {
        return view('admin.village-officials.form', compact('villageOfficial'));
    }

    public function update(VillageOfficialRequest $request, VillageOfficial $villageOfficial)
    {
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            if ($villageOfficial->photo) {
                Storage::disk('public')->delete($villageOfficial->photo);
            }
            $data['photo'] = $request->file('photo')->store('officials', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $villageOfficial->update($data);
        
        return redirect()->route('admin.village-officials.index')
            ->with('success', 'Data pejabat berhasil diperbarui');
    }

    public function destroy(VillageOfficial $villageOfficial)
    {
        if ($villageOfficial->photo) {
            Storage::disk('public')->delete($villageOfficial->photo);
        }
        
        $villageOfficial->delete();
        
        return redirect()->route('admin.village-officials.index')
            ->with('success', 'Data pejabat berhasil dihapus');
    }
}
