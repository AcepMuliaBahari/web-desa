@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Surat</h2>
        <div class="flex space-x-3">
            @if($letter->status === 'pending' && auth()->user()->role === 'admin')
            <form action="{{ route('admin.letters.process', $letter) }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Proses Surat
                </button>
            </form>
            @endif

            @if($letter->status === 'processed' && auth()->user()->role === 'admin')
            <form action="{{ route('admin.letters.complete', $letter) }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                    Selesaikan
                </button>
            </form>
            @endif

            @if($letter->status === 'pending' && auth()->id() === $letter->citizen->user_id)
            <form action="{{ route('admin.letters.destroy', $letter) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                    Hapus
                </button>
            </form>
            @endif
        </div>
    </div>

    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Surat</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->reference_number }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Surat</p>
            <p class="text-base text-gray-900 dark:text-white">{{ ucfirst($letter->type) }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pemohon</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->citizen->name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                @if($letter->status === 'pending')
                    bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                @elseif($letter->status === 'processed')
                @else
                @endif">
                {{ $letter->status_label }}
            </span>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pengajuan</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Terakhir Diupdate</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="sm:col-span-2">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul/Perihal</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->title }}</p>
        </div>
        <div class="sm:col-span-2">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
            <p class="text-base text-gray-900 dark:text-white">{{ $letter->description }}</p>
        </div>
        @if($letter->file_path)
        <div class="sm:col-span-2">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">File Surat</p>
            <a href="{{ Storage::url($letter->file_path) }}" target="_blank" class="text-primary-600 hover:text-primary-700 dark:text-primary-500 dark:hover:text-primary-400">
                <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Lihat File
            </a>
        </div>
        @endif
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('admin.letters.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Kembali
        </a>
    </div>
</div>
@endsection 