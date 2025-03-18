<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'kategori' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul laporan wajib diisi',
            'type.required' => 'Tipe transaksi wajib dipilih',
            'type.in' => 'Tipe transaksi tidak valid',
            'amount.required' => 'Jumlah wajib diisi',
            'amount.numeric' => 'Jumlah harus berupa angka',
            'date.required' => 'Tanggal wajib diisi',
            'date.date' => 'Format tanggal tidak valid',
            'description.required' => 'Deskripsi wajib diisi',
            'file.mimes' => 'File harus berformat PDF, DOC, DOCX, XLS, atau XLSX',
            'file.max' => 'Ukuran file maksimal 2MB',
        ];
    }
} 