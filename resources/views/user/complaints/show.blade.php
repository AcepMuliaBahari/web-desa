@extends('layouts.user')

@section('content')
<div class="container px-6 mx-auto grid gap-6 p-5">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Detail Pengaduan</h1>
        <a href="{{ route('complaints.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $complaint->title }}</h2>
                <div class="flex items-center mt-2 space-x-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        @if($complaint->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($complaint->status === 'processed') bg-blue-100 text-blue-800
                        @else bg-green-100 text-green-800 @endif">
                        {{ ucfirst($complaint->status) }}
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $complaint->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Informasi Pengadu</h3>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Nama:</span> {{ $complaint->reporter_name }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Alamat:</span> {{ $complaint->address }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Telepon:</span> {{ $complaint->phone ?? '-' }}
                        </p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Detail Kejadian</h3>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Jenis:</span> {{ ucfirst($complaint->complaint_type) }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Lokasi:</span> {{ $complaint->incident_location }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Tanggal:</span> {{ $complaint->incident_date ? $complaint->incident_date->format('d/m/Y') : '-' }}
                            @if($complaint->incident_time)
                                {{ $complaint->incident_time->format('H:i') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Isi Pengaduan</h3>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $complaint->content }}</p>
                </div>
            </div>

            <!-- File Attachments -->
            @if($complaint->evidence_file_path || $complaint->document_file_path)
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Lampiran</h3>
                    <div class="space-y-2">
                        @if($complaint->evidence_file_path)
                            <a href="{{ Storage::url($complaint->evidence_file_path) }}" target="_blank"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Lihat Bukti
                            </a>
                        @endif
                        @if($complaint->document_file_path)
                            <a href="{{ Storage::url($complaint->document_file_path) }}" target="_blank"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Lihat Dokumen
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Admin Response Section -->
@if($complaint->response)
    <div class="mt-6 p-5 bg-green-50 dark:bg-green-900/30 border border-green-400 dark:border-green-600 rounded-xl shadow-md">
        <div class="flex items-start space-x-4">
            <!-- Icon -->
            <div class="flex-shrink-0">
                <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7-4a1 1 0 11-2 
                    0 1 1 0 012 0zm-1 3a1 1 0 00-1 1v3a1 1 0 
                    001 1h1a1 1 0 100-2v-2a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>

            <!-- Content -->
            <div class="flex-1">
                <h3 class="text-xl font-semibold text-green-800 dark:text-green-200 mb-2">
                    💬 Tanggapan Admin
                </h3>
                <p class="text-base text-green-700 dark:text-green-300 leading-relaxed whitespace-pre-line">
                    {{ $complaint->response }}
                </p>
                @if($complaint->updated_at && $complaint->updated_at != $complaint->created_at)
                    <p class="text-sm text-green-600 dark:text-green-400 mt-3 italic">
                        Ditanggapi pada {{ $complaint->updated_at->format('d/m/Y H:i') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="mt-6 p-5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-400 dark:border-yellow-600 rounded-xl shadow-md">
        <div class="flex items-start space-x-4">
            <!-- Icon -->
            <div class="flex-shrink-0">
                <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 
                    2.722-1.36 3.486 0l5.58 9.92c.75 
                    1.334-.213 2.98-1.742 2.98H4.42c-1.53 
                    0-2.493-1.646-1.743-2.98l5.58-9.92zM11 
                    13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 
                    0 00-1 1v3a1 1 0 002 0V6a1 1 0 
                    00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>

            <!-- Content -->
            <div class="flex-1">
                <h3 class="text-xl font-semibold text-yellow-800 dark:text-yellow-200 mb-2">
                    ⏳ Menunggu Tanggapan
                </h3>
                <p class="text-base text-yellow-700 dark:text-yellow-300 leading-relaxed">
                    Pengaduan Anda sedang diproses. Admin akan memberikan tanggapan segera.
                </p>
            </div>
        </div>
    </div>
@endif

        </div>
    </div>
</div>
@endsection
