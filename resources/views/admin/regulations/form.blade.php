@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
    <x-alert />
    
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
            {{ isset($regulation) ? 'Edit Regulasi' : 'Tambah Regulasi Baru' }}
        </h2>
    </div>

    <form action="{{ isset($regulation) ? route('admin.regulations.update', $regulation) : route('admin.regulations.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @if(isset($regulation))
            @method('PUT')
        @endif

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Regulasi</label>
                <input type="text" name="title" id="title" value="{{ old('title', $regulation->title ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    required>
            </div>

            <div>
                <label for="regulation_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Regulasi</label>
                <input type="text" name="regulation_number" id="regulation_number" value="{{ old('regulation_number', $regulation->regulation_number ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    required>
            </div>

            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="">Pilih Kategori</option>
                    <option value="perdes" {{ (old('category', $regulation->category ?? '') == 'perdes') ? 'selected' : '' }}>Peraturan Desa</option>
                    <option value="perkades" {{ (old('category', $regulation->category ?? '') == 'perkades') ? 'selected' : '' }}>Peraturan Kepala Desa</option>
                    <option value="sk" {{ (old('category', $regulation->category ?? '') == 'sk') ? 'selected' : '' }}>Surat Keputusan</option>
                </select>
            </div>

            <div>
                <label for="published_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Terbit</label>
                <input type="date" name="published_date" id="published_date" value="{{ old('published_date', $regulation->published_date ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                    required>
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea name="description" id="description" rows="4" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">{{ old('description', $regulation->description ?? '') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="document" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Dokumen</label>
                <input type="file" name="document" id="document" accept=".pdf"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    {{ isset($regulation) ? '' : 'required' }}>
                @if(isset($regulation) && $regulation->document)
                    <p class="mt-1 text-sm text-gray-500">File saat ini: <a href="{{ route('admin.regulations.download', $regulation) }}" class="text-blue-600 hover:underline">Download</a></p>
                @endif
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm text-center me-2 mb-2 px-5 py-2.5">
                {{ isset($regulation) ? 'Update' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.regulations.index') }}" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection 