@extends('components.layout')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb yang Lebih Menarik -->
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
                        <a href="{{ route('potentials.index') }}" class="text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            Potensi Desa
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                        <span class="text-gray-500 dark:text-gray-400">{{ $potensi->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl mx-auto">
            <!-- Hero Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-up">
                <!-- Media Content -->
                <div class="relative">
                    @if($potensi->type === 'video')
                        <div class="aspect-video bg-gray-100 dark:bg-gray-700">
                            <video class="w-full h-full object-cover" controls>
                                <source src="{{ Storage::url($potensi->file_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>
                    @elseif($potensi->image || $potensi->file_path)
                        <div class="aspect-video bg-gray-100 dark:bg-gray-700 relative group">
                            <img src="{{ Storage::url($potensi->image ?? $potensi->file_path) }}" 
                                 alt="{{ $potensi->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                    @endif
                </div>

                <!-- Content Section -->
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $potensi->title }}</h1>
                    
                    <div class="flex flex-wrap gap-4 mb-6 text-sm text-gray-500 dark:text-gray-400">
                        @if($potensi->category)
                            <div class="flex items-center">
                                <i class="fas fa-tag mr-2"></i>
                                <span>{{ $potensi->category }}</span>
                            </div>
                        @endif
                        @if($potensi->location)
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>{{ $potensi->location }}</span>
                            </div>
                        @endif
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>{{ $potensi->created_at->format('d F Y') }}</span>
                        </div>
                    </div>

                    <div class="prose dark:prose-invert max-w-none mb-8">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $potensi->description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Galeri Section dengan Grid yang Lebih Menarik -->
            @if($galleries->count() > 0)
                <div class="mt-12 animate-fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-images mr-3 text-primary-600"></i>
                        Galeri
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($galleries as $gallery)
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                                <div class="relative aspect-video">
                                    @if($gallery->type === 'video')
                                        <video class="w-full h-full object-cover" muted>
                                            <source src="{{ Storage::url($gallery->file_path) }}" type="video/mp4">
                                        </video>
                                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
                                            <i class="fas fa-play-circle text-4xl text-white opacity-80"></i>
                                        </div>
                                    @else
                                        <img src="{{ Storage::url($gallery->file_path) }}" 
                                             alt="{{ $gallery->title }}" 
                                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="absolute bottom-0 left-0 right-0 p-4">
                                            <h3 class="text-white text-lg font-semibold mb-2">{{ $gallery->title }}</h3>
                                            <a href="{{ route('potentials.gallery.show', $gallery) }}" 
                                               class="inline-flex items-center text-sm text-white hover:text-primary-400 transition-colors duration-200">
                                                Lihat Detail
                                                <i class="fas fa-arrow-right ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Action Button -->
            <div class="mt-12 flex justify-center animate-fade-up">
                <a href="{{ route('potentials.index') }}" 
                   class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-all duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Potensi Desa
                </a>
            </div>
        </div>
    </div>
</div>
@endsection