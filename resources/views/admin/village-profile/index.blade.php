@extends('layouts.admin')

@section('content')
<div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <x-alert />
    
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Profil Desa</h2>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ route('admin.village-profile.edit') }}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                </svg>
                Edit Profil
            </a>
        </div>
    </div>

    @if($profile) 
    <div class="p-4">
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Logo Desa</p>
                @if($profile->logo)
                    <img src="{{ Storage::url($profile->logo) }}" alt="Logo Desa" class="mt-2 max-w-[200px] rounded">
                @else
                    <p class="text-sm text-gray-500">Belum ada logo</p>
                @endif
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Desa</p>
                <p class="text-sm text-gray-900 dark:text-white">{{ $profile->village_name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kepala Desa</p>
                <p class="text-sm text-gray-900 dark:text-white">{{ $profile->village_head }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</p>
                <p class="text-sm text-gray-900 dark:text-white">{{ $profile->address }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Telepon</p>
                <p class="text-sm text-gray-900 dark:text-white">{{ $profile->phone }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                <p class="text-sm text-gray-900 dark:text-white">{{ $profile->email }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Visi</p>
                <div class="mt-2 prose dark:prose-invert">
                    {!! nl2br(e($profile->vision)) !!}
                </div>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Misi</p>
                <div class="mt-2 prose dark:prose-invert">
                    {!! nl2br(e($profile->mission)) !!}
                </div>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
                <div class="mt-2 prose dark:prose-invert">
                    {!! nl2br(e($profile->description)) !!}
                </div>
            </div>
            <div class="sm:col-span-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sejarah</p>
                <div class="mt-2 prose dark:prose-invert">
                    {!! nl2br(e($profile->history)) !!}
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="p-4 text-center">
        <p class="text-gray-500 dark:text-gray-400">Profil desa belum diatur</p>
    </div>
    @endif
</div>
@endsection 