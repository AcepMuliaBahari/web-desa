<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'service_name.required' => 'Nama layanan wajib diisi',
            'service_name.max' => 'Nama layanan maksimal 255 karakter',
            'category.required' => 'Kategori layanan wajib diisi',
            'category.max' => 'Kategori layanan maksimal 255 karakter'
        ];
    }
} 