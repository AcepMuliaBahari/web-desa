@extends('components.layout')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb dengan Style yang Lebih Menarik -->
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
                        <a href="{{ route('potentials.index') }}#galeri" class="text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            Galeri
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                        <span class="text-gray-500 dark:text-gray-400">{{ $gallery->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-up">
            <!-- Media Content dengan Loading Skeleton -->
            <div class="relative">
                @if($gallery->type === 'video')
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700">
                        <video class="w-full h-full object-cover" controls>
                            <source src="{{ Storage::url($gallery->file_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                @else
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700 relative group">
                        <img src="{{ Storage::url($gallery->file_path) }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <!-- Overlay saat hover -->
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </div>
                @endif
            </div>

            <!-- Content Section dengan Styling yang Lebih Baik -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 leading-tight">
                    {{ $gallery->title }}
                </h1>
                
                <div class="flex items-center mb-6 text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span>{{ $gallery->created_at->format('d F Y') }}</span>
                    @if($gallery->location)
                        <span class="mx-2">•</span>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{ $gallery->location }}</span>
                    @endif
                </div>

                <div class="prose dark:prose-invert max-w-none mb-8">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $gallery->description }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('potentials.index') }}#galeri" 
                       class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-all duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Galeri
                    </a>
                    @if($gallery->type !== 'video' && $gallery->file_path)
                        <a href="{{ Storage::url($gallery->file_path) }}" 
                           download
                           class="inline-flex items-center px-6 py-3 text-sm font-medium text-primary-600 bg-primary-100 rounded-lg hover:bg-primary-200 focus:ring-4 focus:ring-primary-300 dark:text-primary-400 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-primary-800 transition-all duration-200">
                            <i class="fas fa-download mr-2"></i>
                            Download Gambar
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection