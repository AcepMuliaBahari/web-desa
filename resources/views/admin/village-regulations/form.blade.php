@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                   {{-- Include the alert component --}}
                   @include('components.alert')
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ isset($regulation) ? 'Edit Regulasi' : 'Tambah Regulasi' }}
                    </h2>
                    <a href="{{ route('admin.village-regulations.index') }}" 
                       class="text-gray-600 hover:text-primary-600 transition-colors duration-200">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form action="{{ isset($regulation) ? route('admin.village-regulations.update', $regulation->id) : route('admin.village-regulations.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data">
                @csrf
                @if(isset($regulation))
                    @method('PUT')
                @endif
            

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Judul Regulasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="title" 
                               value="{{ old('title', $regulation->title ?? '') }}"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type & Category -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Tipe Regulasi <span class="text-red-500">*</span>
                            </label>
                            <select name="type" 
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                                    required>
                                <option value="">Pilih Tipe</option>
                                <option value="produk_hukum" {{ old('type', $regulation->type ?? '') == 'produk_hukum' ? 'selected' : '' }}>
                                    Produk Hukum
                                </option>
                                <option value="informasi_publik" {{ old('type', $regulation->type ?? '') == 'informasi_publik' ? 'selected' : '' }}>
                                    Informasi Publik
                                </option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="category" 
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                                    required>
                                <option value="">Pilih Kategori</option>
                                <option value="perdes" {{ old('category', $regulation->category ?? '') == 'perdes' ? 'selected' : '' }}>
                                    Peraturan Desa
                                </option>
                                <option value="perkades" {{ old('category', $regulation->category ?? '') == 'perkades' ? 'selected' : '' }}>
                                    Peraturan Kepala Desa
                                </option>
                                <option value="sk_kades" {{ old('category', $regulation->category ?? '') == 'sk_kades' ? 'selected' : '' }}>
                                    SK Kepala Desa
                                </option>
                                <option value="apbdes" {{ old('category', $regulation->category ?? '') == 'apbdes' ? 'selected' : '' }}>
                                    APBDes
                                </option>
                                <option value="lainnya" {{ old('category', $regulation->category ?? '') == 'lainnya' ? 'selected' : '' }}>
                                    Lainnya
                                </option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Number & Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Nomor Regulasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="number" 
                                   value="{{ old('number', $regulation->number ?? '') }}"
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                                   required>
                            @error('number')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Tanggal Ditetapkan <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="date_enacted" 
                                   value="{{ old('date_enacted', isset($regulation) ? $regulation->date_enacted?->format('Y-m-d') : '') }}"

                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                                   required>
                            @error('date_enacted')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Deskripsi
                        </label>
                        <textarea name="description" 
                                  rows="4" 
                                  class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500">{{ old('description', $regulation->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            File PDF {{ isset($regulation) ? '' : '<span class="text-red-500"></span>' }}
                        </label>
                        <input type="file" 
                               name="file" 
                               accept=".pdf"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-primary-500 focus:border-primary-500"
                               {{ isset($regulation) ? '' : 'required' }}>
                        @if(isset($regulation) && $regulation->file_path)
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                File saat ini: {{ basename($regulation->file_path) }}
                            </p>
                        @endif
                        @error('file')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published Status -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_published" 
                                   value="1"
                                   {{ old('is_published', $regulation->is_published ?? true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 dark:border-gray-600 text-primary-600 focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Publikasikan sekarang</span>
                        </label>
                        @error('is_published')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            {{ isset($regulation) ? 'Update Regulasi' : 'Simpan Regulasi' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection