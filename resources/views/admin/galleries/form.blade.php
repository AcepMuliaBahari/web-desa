@extends('layouts.admin')

@section('content')
<div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
        {{ isset($gallery) ? 'Edit Galeri' : 'Tambah Galeri' }}
    </h2>
    
    <form action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @if(isset($gallery))
            @method('PUT')
        @endif
        
        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
            <div class="sm:col-span-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" name="title" id="title" 
                    value="{{ old('title', $gallery->title ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea name="description" id="description" rows="4" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('description', $gallery->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                <select name="type" id="type" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    required>
                    <option value="image" {{ (old('type', $gallery->type ?? '') == 'image') ? 'selected' : '' }}>Gambar</option>
                    <option value="video" {{ (old('type', $gallery->type ?? '') == 'video') ? 'selected' : '' }}>Video</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                <input type="file" name="file" id="file" 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                    accept=".jpg,.jpeg,.png,.gif,.mp4" 
                    {{ isset($gallery) ? '' : 'required' }}>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Format yang didukung: JPG, JPEG, PNG, GIF, MP4. Maksimal 10MB.</p>
                @error('file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" 
                        {{ (old('is_active', $gallery->is_active ?? true) ? 'checked' : '') }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-lime-400 rounded-lg hover:bg-lime-500">
                {{ isset($gallery) ? 'Simpan Perubahan' : 'Tambah Galeri' }}
            </button>
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-primary-800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection 