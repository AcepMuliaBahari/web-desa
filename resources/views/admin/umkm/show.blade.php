@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail UMKM</h2>
        <a href="{{ route('admin.umkm.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Kembali
        </a>
    </div>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama UMKM</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->category }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->description }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Harga</p>
            <p class="text-sm text-gray-900 dark:text-white">Rp {{ number_format($umkm->price, 0, ',', '.') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Pemilik</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->owner_name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kontak</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->contact }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $umkm->address }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $umkm->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $umkm->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Foto</p>
            @if($umkm->image)
                <div class="mt-2">
                    <img src="{{ Storage::url($umkm->image) }}" alt="{{ $umkm->name }}" class="max-w-sm rounded">
                </div>
            @else
                <p class="text-sm text-gray-500">Tidak ada foto</p>
            @endif
        </div>
    </div>
</div>
@endsection 