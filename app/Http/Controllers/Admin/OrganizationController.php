<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Http\Requests\OrganizationRequest;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('parent')
            ->when(request('search'), function($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('role', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhereHas('parent', function($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
                });
            })
            ->ordered()
            ->paginate(10);
        
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        $organizations = Organization::ordered()->get();
        return view('admin.organizations.form', compact('organizations'));
    }

    public function store(OrganizationRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('organizations', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        Organization::create($data);
        return redirect()->route('admin.organizations.index')
            ->with('toast', 'Organisasi berhasil ditambahkan');
    }

    public function show(Organization $organization)
    {
        return view('admin.organizations.show', compact('organization'));
    }

    public function edit(Organization $organization)
    {
        $organizations = Organization::where('id', '!=', $organization->id)->ordered()->get();
        return view('admin.organizations.form', compact('organization', 'organizations'));
    }

    public function update(OrganizationRequest $request, Organization $organization)
    {
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($organization->photo) {
                Storage::disk('public')->delete($organization->photo);
            }
            $data['photo'] = $request->file('photo')->store('organizations', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $organization->update($data);
        return redirect()->route('admin.organizations.index')
            ->with('success', 'Organisasi berhasil diperbarui');
    }

    public function destroy(Organization $organization)
    {
        // Hapus foto jika ada
        if ($organization->photo) {
            Storage::disk('public')->delete($organization->photo);
        }
        
        $organization->delete();
        return redirect()->route('admin.organizations.index')
            ->with('success', 'Organisasi berhasil dihapus');
    }
} 