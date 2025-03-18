@extends('layouts.admin')

@section('content')
<div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Visi & Misi</h2>
    
    @include('components.alert')

    <form action="{{ route('admin.village-profile.vision-mission.update') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Visi
            </label>
            <textarea name="vision" 
                      rows="3" 
                      class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('vision', $profile->vision) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Misi
            </label>
            <textarea name="mission" 
                      rows="6" 
                      class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('mission', $profile->mission) }}</textarea>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Pisahkan setiap misi dengan baris baru
            </p>
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