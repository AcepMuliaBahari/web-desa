<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageOfficialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'period_start' => 'nullable|date',
            'period_end' => 'nullable|date|after:period_start',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama pejabat harus diisi',
            'name.max' => 'Nama pejabat maksimal 255 karakter',
            'position.required' => 'Jabatan harus diisi',
            'position.max' => 'Jabatan maksimal 255 karakter',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'photo.max' => 'Ukuran gambar maksimal 2MB',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'period_start.date' => 'Format tanggal mulai tidak valid',
            'period_end.date' => 'Format tanggal selesai tidak valid',
            'period_end.after' => 'Tanggal selesai harus setelah tanggal mulai',
            'order.integer' => 'Urutan harus berupa angka',
            'order.min' => 'Urutan minimal 0'
        ];
    }
}
