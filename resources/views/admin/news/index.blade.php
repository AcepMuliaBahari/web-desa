@extends('layouts.admin')

@section('content')
<x-alert />
<x-delete-modal />
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

    
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Berita</h2>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ route('admin.news.create') }}" class="flex items-center justify-center text-yellow-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Berita
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Judul</th>
                    <th scope="col" class="px-4 py-3">Kategori</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">Tanggal</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $item->title }}</td>
                    <td class="px-4 py-3">{{ $item->category }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $item->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $item->is_published ? 'Dipublikasi' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.news.show', $item) }}" 
                               class="px-2 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                Detail
                            </a>
                            <a href="{{ route('admin.news.edit', $item) }}" 
                               class="px-2 py-1 text-xs text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 transition-colors duration-200">
                                Edit
                            </a>
                            <button type="button" onclick="openDeleteModal('{{ route('admin.news.destroy', $item) }}', '{{ $item->title }}')" 
                               class="px-2 py-1 text-xs text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 
