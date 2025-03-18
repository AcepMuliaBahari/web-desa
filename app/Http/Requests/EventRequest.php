<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul acara wajib diisi',
            'title.max' => 'Judul acara maksimal 255 karakter',
            'description.required' => 'Deskripsi acara wajib diisi',
            'location.required' => 'Lokasi acara wajib diisi',
            'location.max' => 'Lokasi acara maksimal 255 karakter',
            'event_date.required' => 'Tanggal acara wajib diisi',
            'event_date.date' => 'Format tanggal acara tidak valid',
            'start_time.required' => 'Waktu mulai wajib diisi',
            'start_time.date_format' => 'Format waktu mulai tidak valid',
            'end_time.required' => 'Waktu selesai wajib diisi',
            'end_time.date_format' => 'Format waktu selesai tidak valid',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai'
        ];
    }
} 