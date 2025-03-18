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
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                        <a href="{{ route('umkm.index') }}" class="text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            UMKM Desa
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                        <span class="text-gray-500 dark:text-gray-400">{{ $umkm->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl mx-auto">
            <!-- UMKM Detail Card -->
            <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-up">
                <!-- Featured Image -->
                <div class="relative">
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700">
                        <img src="{{ Storage::url($umkm->image) }}"
                             alt="{{ $umkm->name }}"
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $umkm->name }}</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tentang UMKM</h2>
                                <p class="text-gray-600 dark:text-gray-300">{{ $umkm->description }}</p>
                            </div>

                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Produk/Layanan</h2>
                                <p class="text-gray-600 dark:text-gray-300">{{ $umkm->products }}</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Informasi Kontak</h2>
                                
                                <div class="space-y-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <div>
                                            <p class="font-medium">Pemilik</p>
                                            <p>{{ $umkm->owner_name }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        <div>
                                            <p class="font-medium">Kontak</p>
                                            <p>{{ $umkm->contact }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start text-gray-600 dark:text-gray-300">
                                        <svg class="w-5 h-5 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <div>
                                            <p class="font-medium">Alamat</p>
                                            <p>{{ $umkm->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($umkm->social_media)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Media Sosial</h2>
                                <div class="flex gap-4">
                                    @foreach($umkm->social_media as $platform => $link)
                                    <a href="{{ $link }}" target="_blank" class="text-gray-600 hover:text-primary-600 dark:text-gray-300">
                                        <i class="fab fa-{{ strtolower($platform) }} text-2xl"></i>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </article>

            <!-- Navigation Button -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('umkm.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-all duration-200 group">
                    <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                    Kembali ke Daftar UMKM
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 