<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_kk',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'pendidikan'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];




}
