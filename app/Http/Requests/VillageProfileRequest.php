<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'village_name' => 'required|string|max:255',
            'village_head' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'history' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'village_name.required' => 'Nama desa wajib diisi',
            'village_head.required' => 'Nama kepala desa wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'vision.required' => 'Visi wajib diisi',
            'mission.required' => 'Misi wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'logo.image' => 'File harus berupa gambar',
            'logo.mimes' => 'Format logo harus jpeg, png, atau jpg',
            'logo.max' => 'Ukuran logo maksimal 2MB',
            'history.required' => 'Sejarah wajib diisi'
        ];
    }
} 