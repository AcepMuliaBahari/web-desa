@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Layanan</h2>
        <a href="{{ route('admin.public-services.index') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            Kembali
        </a>
    </div>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Layanan</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $publicService->service_name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $publicService->category }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $publicService->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $publicService->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <div class="mt-2 prose dark:prose-invert">
                {!! nl2br(e($publicService->description)) !!}
            </div>
        </div>
    </div>
</div>
@endsection 