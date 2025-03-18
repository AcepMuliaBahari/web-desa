@extends('layouts.admin')

@section('content')
<div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Struktur Organisasi</h2>
    
    @include('components.alert')

    <form action="{{ route('admin.village-profile.structure.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            @if($profile->structure_image)
                <div class="mb-4">
                    <img src="{{ Storage::url($profile->structure_image) }}" 
                         alt="Struktur Organisasi" 
                         class="max-w-xl mx-auto">
                </div>
            @endif
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Upload Gambar Struktur Organisasi
            </label>
            <input type="file" 
                   name="structure_image" 
                   accept="image/*"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection 