@extends('components.layout')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 animate-fade-down" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white dark:bg-gray-800 px-4 py-2 rounded-lg shadow-sm">
                <li class="inline-flex items-center">
                    <a href="{{ route('desa') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                        <span class="text-gray-500 dark:text-gray-400">UMKM Desa</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="text-center mb-12 animate-fade-up">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">UMKM Desa</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Temukan berbagai produk dan layanan dari UMKM lokal di desa kami</p>
        </div>

        <!-- Filter Section -->
        <div class="mb-8 animate-fade-up">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4">
                <form action="{{ route('umkm.index') }}" method="GET" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                               placeholder="Cari UMKM...">
                    </div>
                    <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Cari
                    </button>
                </form>
            </div>
        </div>

        <!-- UMKM Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-up">
            @forelse($umkm as $item)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700 relative group">
                        <img src="{{ Storage::url($item->image) }}" 
                             alt="{{ $item->name }}" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">{{ $item->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($item->description, 100) }}</p>
                        
                        <div class="flex flex-col space-y-3">
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $item->owner_name }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span>{{ $item->contact }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-sm">{{ Str::limit($item->address, 50) }}</span>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('umkm.show', $item->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                Lihat Detail
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
                        <i class="fas fa-store text-4xl text-gray-400 dark:text-gray-600 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tidak Ada UMKM</h3>
                        <p class="text-gray-600 dark:text-gray-400">Belum ada UMKM yang terdaftar saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $umkm->links() }}
        </div>
    </div>
</div>
@endsection 