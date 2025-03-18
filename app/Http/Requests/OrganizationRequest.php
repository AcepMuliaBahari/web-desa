<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'parent_id' => 'nullable|exists:organizations,id',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama organisasi harus diisi',
            'name.max' => 'Nama organisasi maksimal 255 karakter',
            'role.required' => 'Jabatan harus diisi',
            'role.max' => 'Jabatan maksimal 255 karakter',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'photo.max' => 'Ukuran gambar maksimal 2MB',
            'parent_id.exists' => 'Organisasi induk tidak valid',
            'order.integer' => 'Urutan harus berupa angka',
            'order.min' => 'Urutan minimal 0'
        ];
    }
} 