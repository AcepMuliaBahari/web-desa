<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchiveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'file' => $this->isMethod('PUT') ? 'nullable|file|mimes:pdf,doc,docx|max:10240' : 'required|file|mimes:pdf,doc,docx|max:10240'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul arsip wajib diisi',
            'title.max' => 'Judul arsip maksimal 255 karakter',
            'category.required' => 'Kategori arsip wajib diisi',
            'category.max' => 'Kategori arsip maksimal 255 karakter',
            'year.required' => 'Tahun arsip wajib diisi',
            'year.integer' => 'Tahun arsip harus berupa angka',
            'year.min' => 'Tahun arsip minimal 1900',
            'year.max' => 'Tahun arsip maksimal tahun depan',
            'file.required' => 'File arsip wajib diupload',
            'file.file' => 'File arsip harus berupa file',
            'file.mimes' => 'File arsip harus berupa PDF, DOC, atau DOCX',
            'file.max' => 'Ukuran file arsip maksimal 10MB'
        ];
    }
} 