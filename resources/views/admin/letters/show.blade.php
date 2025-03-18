@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="p-4">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <a href="{{ route('admin.letters.index') }}" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700 mr-4">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Surat</h2>
            </div>
            @if($letter->status === 'pending')
            <div class="flex space-x-2">
                <form action="{{ route('admin.letters.approve', $letter) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Setujui
                    </button>
                </form>
                <form action="{{ route('admin.letters.reject', $letter) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        Tolak
                    </button>
                </form>
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Surat -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Surat</h3>
                <dl class="grid grid-cols-1 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Surat</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->letter_number }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Surat</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->type }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                        <dd>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($letter->status === 'approved') bg-green-100 text-green-800 
                                @elseif($letter->status === 'rejected') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($letter->status) }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pengajuan</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Informasi Pemohon -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Pemohon</h3>
                <dl class="grid grid-cols-1 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Lengkap</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->citizen->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">NIK</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->citizen->nik }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor KK</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->citizen->no_kk }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->citizen->address }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Detail Pengajuan -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg md:col-span-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Detail Pengajuan</h3>
                <dl class="grid grid-cols-1 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Keperluan</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->purpose }}</dd>
                    </div>
                    @if($letter->description)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Keterangan</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->description }}</dd>
                    </div>
                    @endif
                    @if($letter->notes)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Catatan</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $letter->notes }}</dd>
                    </div>
                    @endif
                    @if($letter->attachment_path)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lampiran</dt>
                        <dd class="mt-1">
                            <a href="{{ Storage::url($letter->attachment_path) }}" target="_blank" 
                                class="inline-flex items-center text-sm text-primary-600 hover:text-primary-700 dark:text-primary-500">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                </svg>
                                Lihat Lampiran
                            </a>
                        </dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection 