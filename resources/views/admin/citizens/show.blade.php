@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Penduduk</h2>
    
    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">NIK</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->nik }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No KK</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->no_kk }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tempat, Tanggal Lahir</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->tempat_lahir }}, {{ $citizen->tanggal_lahir->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Kelamin</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->alamat }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">RT/RW</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->rt }}/{{ $citizen->rw }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Agama</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->agama }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status Perkawinan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->status_perkawinan }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pekerjaan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->pekerjaan }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kewarganegaraan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->kewarganegaraan }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pendidikan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $citizen->pendidikan }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.citizens.index') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            Kembali
        </a>
    </div>
</div>
@endsection