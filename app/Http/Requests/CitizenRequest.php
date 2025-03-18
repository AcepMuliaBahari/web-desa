<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $uniqueRule = 'unique:citizens,nik';
        if ($this->citizen) {
            $uniqueRule .= ',' . $this->citizen->id;
        }

        return [
            'nik' => ['required', 'string', 'size:16', $uniqueRule],
            'no_kk' => 'required|string|size:16',
            'name' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'rt' => 'required|string|size:3',
            'rw' => 'required|string|size:3',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'pendidikan' => 'required|in:Tidak/Belum Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,D1,D2,D3,D4/S1,S2,S3'
        ];
    }

    public function messages(): array
    {
        return [
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'no_kk.required' => 'Nomor KK wajib diisi',
            'no_kk.size' => 'Nomor KK harus 16 digit',
            'name.required' => 'Nama lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid',
            'alamat.required' => 'Alamat wajib diisi',
            'rt.required' => 'RT wajib diisi',
            'rt.size' => 'RT harus 3 digit',
            'rw.required' => 'RW wajib diisi',
            'rw.size' => 'RW harus 3 digit',
            'agama.required' => 'Agama wajib diisi',
            'agama.in' => 'Agama tidak valid',
            'status_perkawinan.required' => 'Status perkawinan wajib diisi',
            'status_perkawinan.in' => 'Status perkawinan tidak valid',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi',
            'kewarganegaraan.in' => 'Kewarganegaraan tidak valid',
            'pendidikan.required' => 'Pendidikan wajib diisi',
            'pendidikan.in' => 'Pendidikan tidak valid'
        ];
    }
} 