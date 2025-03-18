@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full">
            <div class="flex items-center">
                <a href="{{ route('admin.finances.index') }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 mr-4">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Kembali
                </a>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detail Laporan Keuangan</h2>
            </div>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ route('admin.finances.edit', $finance) }}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                </svg>
                Edit
            </a>
        </div>
    </div>

    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $finance->title }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $finance->date->format('d/m/Y') }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tipe</dt>
                <dd class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $finance->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $finance->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                    </span>
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah</dt>
                <dd class="mt-1 text-sm font-semibold {{ $finance->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                    Rp {{ number_format($finance->amount, 0, ',', '.') }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $finance->kategori }}</dd>
            </div>

            @if($finance->file_path)
            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">File</dt>
                <dd class="mt-1">
                    <a href="{{ Storage::url($finance->file_path) }}" target="_blank" 
                       class="inline-flex items-center text-sm text-primary-700 hover:underline dark:text-primary-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                        </svg>
                        Unduh Lampiran
                    </a>
                </dd>
            </div>
            @endif

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Keterangan</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white whitespace-pre-line">{{ $finance->description }}</dd>
            </div>
        </dl>
    </div>
</div>
@endsection 