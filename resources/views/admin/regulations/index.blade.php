@extends('layouts.admin')

@section('content')
<x-alert />
<x-delete-modal />
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

    
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Regulasi Desa</h2>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <form class="flex items-center">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Cari regulasi...">
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-primary-700 rounded-lg border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

            <a href="{{ route('admin.regulations.create') }}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
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
                    <th scope="col" class="px-4 py-3">Kategori</th>
                    <th scope="col" class="px-4 py-3">Tanggal Terbit</th>
                    <th scope="col" class="px-4 py-3">Dokumen</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($regulations as $regulation)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $regulation->title }}</td>
                        <td class="px-4 py-3">{{ $regulation->regulation_number }}</td>
                        <td class="px-4 py-3">
                            @switch($regulation->category)
                                @case('perdes')
                                    Peraturan Desa
                                    @break
                                @case('perkades')
                                    Peraturan Kepala Desa
                                    @break
                                @case('sk')
                                    Surat Keputusan
                                    @break
                                @default
                                    {{ $regulation->category }}
                            @endswitch
                        </td>
                        <td class="px-4 py-3">{{ $regulation->published_date->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            @if($regulation->document)
                                <a href="{{ route('admin.regulations.download', $regulation) }}" 
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Download
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.regulations.edit', $regulation) }}" 
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <button type="button" onclick="openDeleteModal('{{ route('admin.regulations.destroy', $regulation) }}', '{{ $regulation->title }}')" 
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center">Tidak ada data regulasi</td>
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
