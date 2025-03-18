@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Arsip</h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.archives.download', $archive) }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                Download
            </a>
            <a href="{{ route('admin.archives.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Kembali
            </a>
        </div>
    </div>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $archive->title }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $archive->category }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tahun</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $archive->year }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">File</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ basename($archive->file_path) }}</p>
        </div>
    </div>
</div>
@endsection 