<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageRegulationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:produk_hukum,informasi_publik',
            'category' => 'required|in:perdes,perkades,sk_kades,apbdes,lainnya',
            'number' => 'required|string|max:50',
            'date_enacted' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'is_published' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul peraturan wajib diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'type.required' => 'Tipe peraturan wajib dipilih',
            'type.in' => 'Tipe peraturan tidak valid',
            'category.required' => 'Kategori peraturan wajib dipilih',
            'category.in' => 'Kategori peraturan tidak valid',
            'number.required' => 'Nomor peraturan wajib diisi',
            'date_enacted.required' => 'Tanggal pengesahan wajib diisi',
            'date_enacted.date' => 'Format tanggal tidak valid',
            'file.mimes' => 'File harus berformat PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file maksimal 2MB'
        ];
    }
} 