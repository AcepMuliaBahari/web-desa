@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Organisasi</h2>
        <a href="{{ route('admin.organizations.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Kembali
        </a>
    </div>
    
    <div class="grid gap-4">
        <div class="flex justify-center">
            <img src="{{ $organization->photo_url }}" alt="{{ $organization->name }}" class="w-32 h-32 rounded-lg object-cover">
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Organisasi</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $organization->name }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jabatan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $organization->role }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Organisasi Induk</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $organization->parent?->name ?? '-' }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <div class="mt-2 prose dark:prose-invert">
                {!! nl2br(e($organization->description)) !!}
            </div>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kontak</p>
            <p class="text-sm text-gray-900 dark:text-white">
                Telepon: {{ $organization->contact_phone ?? '-' }}<br>
                Email: {{ $organization->contact_email ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Urutan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $organization->position ?? '-' }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $organization->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $organization->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </p>
        </div>
    </div>
</div>
@endsection 