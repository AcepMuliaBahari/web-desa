@extends('layouts.user')

@section('content')

<div class="container px-6 mx-auto grid gap-6 p-5">


    <!-- Grid untuk konten tambahan -->
    <div class="grid w-full grid-cols-1 gap-4 mt-6 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">User Info</h3>
            </div>
            <div class="space-y-4">
                <p class="text-gray-700 dark:text-gray-300">Welcome, {{ auth()->user()->name }}!</p>
                <p class="text-gray-700 dark:text-gray-300">Email: {{ auth()->user()->email }}</p>
                <!-- Add more user info or features here -->
            </div>
        </div>

        <!-- Complaints Section -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pengaduan Saya</h3>
                <a href="{{ route('complaints.index') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    Lihat Semua
                </a>
            </div>
            <div class="space-y-4">
                @if($complaints && $complaints->count() > 0)
                    @foreach($complaints->take(3) as $complaint)
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($complaint->title, 30) }}</h4>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">{{ Str::limit($complaint->content, 50) }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    @if($complaint->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($complaint->status === 'processed') bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $complaint->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-6">
                        <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Belum ada pengaduan</p>
                        <a href="{{ route('complaints.create') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mt-1 inline-block">
                            Buat pengaduan pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
