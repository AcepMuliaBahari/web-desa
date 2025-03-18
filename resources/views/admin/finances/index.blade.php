@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <x-alert />
       <!-- Tambahkan setelah header dan sebelum tabel -->
       <div class="grid grid-cols-1 gap-4 p-4 mb-4 md:grid-cols-3">
        <!-- Saldo -->
        <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">
                        Rp {{ number_format($totalBalance, 0, ',', '.') }}
                    </span>
                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total Saldo</h3>
                </div>
                <div class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Pemasukan -->
        <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-green-600 sm:text-2xl dark:text-green-400">
                        Rp {{ number_format($totalIncome, 0, ',', '.') }}
                    </span>
                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total Pemasukan</h3>
                </div>
                <div class="flex items-center justify-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:text-green-300 dark:bg-green-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6h10a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4a2 2 0 012-2zm8 2h-6v4h6v-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Pengeluaran -->
        <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-red-600 sm:text-2xl dark:text-red-400">
                        Rp {{ number_format($totalExpense, 0, ',', '.') }}
                    </span>
                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total Pengeluaran</h3>
                </div>
                <div class="flex items-center justify-center w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:text-red-300 dark:bg-red-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6h10a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4a2 2 0 012-2zm8 2h-6v4h6v-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Laporan Keuangan</h2>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ route('admin.finances.create') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Laporan
            </a>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <form action="{{ route('admin.finances.index') }}" method="GET" class="grid gap-4 md:grid-cols-5">
            <!-- Pencarian -->
            <div class="md:col-span-2">
                <label for="search" class="sr-only">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                           placeholder="Cari laporan...">
                </div>
            </div>

            <!-- Filter Tipe -->
            <div>
                <select name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Semua Tipe</option>
                    <option value="income" {{ request('type') === 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ request('type') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>

            <!-- Filter Kategori -->
            <div>
                <select name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Semua Kategori</option>
                    <option value="Operasional" {{ request('kategori') === 'Operasional' ? 'selected' : '' }}>Operasional</option>
                    <option value="Pembangunan" {{ request('kategori') === 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                    <option value="Bantuan" {{ request('kategori') === 'Bantuan' ? 'selected' : '' }}>Bantuan</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    Filter
                </button>
                <a href="{{ route('admin.finances.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Reset
                </a>
            </div>
        </form>
    </div>

 
    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Judul</th>
                    <th scope="col" class="px-4 py-3">Tipe</th>
                    <th scope="col" class="px-4 py-3">Kategori</th>
                    <th scope="col" class="px-4 py-3">file</th>
                    <th scope="col" class="px-4 py-3">Jumlah</th>
                    
                    <th scope="col" class="px-4 py-3">Tanggal</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($finances as $finance)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $finance->title }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                            {{ $finance->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $finance->type_label }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $finance->kategori }}</td>
                    <td class="px-4 py-3">{{ $finance->file_path }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($finance->amount, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $finance->date->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.finances.show', $finance) }}" 
                               class="px-2 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Detail
                            </a>
                            <a href="{{ route('admin.finances.edit', $finance) }}" 
                               class="px-2 py-1 text-xs text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
                                Edit
                            </a>
                            <form action="{{ route('admin.finances.destroy', $finance) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Yakin hapus laporan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-xs text-white bg-red-600 rounded-lg hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="p-4">
        {{ $finances->withQueryString()->links() }}
    </div>
</div>
@endsection 