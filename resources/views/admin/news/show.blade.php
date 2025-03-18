@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Berita</h2>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $news->title }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $news->category }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $news->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $news->is_published ? 'Dipublikasi' : 'Draft' }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Dibuat</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $news->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Foto</p>
            @if($news->photo)
                <img src="{{ Storage::url($news->photo) }}" alt="{{ $news->title }}" class="mt-2 max-w-sm rounded">
            @else
                <p class="text-sm text-gray-500">Tidak ada foto</p>
            @endif
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Konten</p>
            <div class="mt-2 prose dark:prose-invert max-w-none">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.news.index') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            Kembali
        </a>
    </div>
</div>
@endsection 