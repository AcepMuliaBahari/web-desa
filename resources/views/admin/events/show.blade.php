@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Acara</h2>
        <a href="{{ route('admin.events.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Kembali
        </a>
    </div>
    
    <div class="grid gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $event->title }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <div class="mt-2 prose dark:prose-invert">
                {!! nl2br(e($event->description)) !!}
            </div>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lokasi</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $event->location }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal</p>
            <p class="text-sm text-gray-900 dark:text-white">{{ $event->event_date->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Waktu</p>
            <p class="text-sm text-gray-900 dark:text-white">
                {{ $event->start_time->format('H:i') }} - {{ $event->end_time->format('H:i') }}
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <p class="text-sm">
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $event->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $event->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </p>
        </div>
    </div>
</div>
@endsection 