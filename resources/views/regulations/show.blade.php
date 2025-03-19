@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('regulations.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Regulasi
            </a>
        </div>

        <!-- Main Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="space-y-2">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-sm font-semibold text-green-800 dark:text-green-300 bg-green-100 dark:bg-green-800 rounded-full">
                                {{ $regulation->category_label }}
                            </span>
                            <span class="px-3 py-1 text-sm font-semibold text-purple-800 dark:text-purple-300 bg-purple-100 dark:bg-purple-800 rounded-full">
                                {{ $regulation->type_label }}
                            </span>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ $regulation->title }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6 space-y-8">
                <!-- Metadata Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
                    <div class="space-y-1">
                        <p class="font-semibold">Nomor Regulasi</p>
                        <p class="text-lg text-blue-600 dark:text-blue-400">{{ $regulation->number }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="font-semibold">Tanggal Ditetapkan</p>
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            {{ $regulation->date_enacted->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Deskripsi Regulasi</h3>
                    <div class="prose max-w-none dark:prose-invert text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                        {!! nl2br(e($regulation->description)) !!}
                    </div>
                </div>

                <!-- File Section -->
                @if($regulation->file_path)
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Dokumen Regulasi</h3>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <iframe 
                            src="{{ Storage::url($regulation->file_path) }}" 
                            class="w-full h-[70vh] min-h-[400px]"
                            title="Preview Dokumen {{ $regulation->title }}"
                        ></iframe>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Jika preview tidak tampil, Anda bisa mengunduh dokumen melalui tombol di samping.
                        </p>
                        <a href="{{ route('regulations.download', $regulation) }}" 
                           class="inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 font-semibold shadow-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Unduh Dokumen
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection