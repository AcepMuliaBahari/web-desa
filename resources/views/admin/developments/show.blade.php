@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Pembangunan</h2>
        <a href="{{ route('admin.developments.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Kembali
        </a>
    </div>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul Pembangunan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->title }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->description }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lokasi</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->location }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Anggaran</p>
            <p class="text-sm text-gray-900 dark:text-white">Rp {{ number_format($development->budget, 0, ',', '.') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Progress</p>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-2">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $development->progress }}%"></div>
            </div>
            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $development->progress }}%</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                    @if($development->status === 'Selesai') bg-green-100 text-green-800 
                    @elseif($development->status === 'Tertunda') bg-yellow-100 text-yellow-800
                    @elseif($development->status === 'Belum Dimulai') bg-red-100 text-red-800
                    @else bg-blue-100 text-blue-800 @endif">
                    {{ $development->status }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Mulai</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->start_date->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Selesai</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->end_date->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">PIC</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->pic_name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kontak PIC</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $development->pic_contact }}</p>
        </div>
    </div>
</div>
@endsection 