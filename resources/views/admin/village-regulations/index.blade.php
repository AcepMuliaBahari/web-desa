@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <x-alert />
    
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Regulasi Desa</h2>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            {{-- Form Pencarian --}}
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Cari regulasi..." />
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-primary-700 rounded-lg border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

            <a href="{{ route('admin.village-regulations.create') }}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Regulasi
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Judul</th>
                    <th scope="col" class="px-4 py-3">Nomor</th>
                    <th scope="col" class="px-4 py-3">Tahun</th>
                    <th scope="col" class="px-4 py-3">File</th>
                    <th scope="col" class="px-4 py-3">Kategori</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($regulations as $regulation)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $regulation->title }}
                    </td>
                    <td class="px-4 py-3">{{ $regulation->number ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $regulation->date_enacted->year }}</td>
                            <!-- Tambahkan kolom File -->
        <td class="px-4 py-3">
            @if($regulation->file_path)
                <a href="{{ route('admin.village-regulations.download', $regulation) }}" 
                   class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                    <i class="fas fa-file-pdf text-lg mr-1.5"></i>
                    <span class="hover:underline">Download</span>
                </a>
            @else
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-times-circle text-lg mr-1.5"></i>
                    Tidak ada file
                </span>
            @endif
        </td>
                    <td class="px-4 py-3">{{ ucfirst(str_replace('_', ' ', $regulation->category)) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $regulation->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $regulation->is_published ? 'Dipublikasikan' : 'Tidak Dipublikasikan' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.village-regulations.show', $regulation) }}" 
                               class="px-2 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Detail
                            </a>
                            <a href="{{ route('admin.village-regulations.edit', $regulation) }}" 
                               class="px-2 py-1 text-xs text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
                                Edit
                            </a>
                            <form action="{{ route('admin.village-regulations.destroy', $regulation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus regulasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="border-b dark:border-gray-700">
                    <td colspan="7" class="px-4 py-3 text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($regulations->hasPages())
    <div class="p-4">
        {{ $regulations->links() }}
    </div>
    @endif
</div>
@endsection
