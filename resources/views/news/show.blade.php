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
                            <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                Berita
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                            <span class="text-gray-500 dark:text-gray-400">{{ Str::limit($news->title, 40) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="max-w-4xl mx-auto">
                <!-- Article Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-up">
                    <!-- Featured Image -->
                    <div class="relative">
                        <div class="aspect-video bg-gray-100 dark:bg-gray-700 relative group">
                            <img src="{{ $news->photo ? asset('storage/' . $news->photo) : asset('images/news-placeholder.jpg') }}"
                                 alt="{{ $news->title }}"
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/50 to-transparent"></div>
                        </div>
                        
                        <!-- Title & Meta Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="flex items-center gap-3 text-white/80 text-sm mb-4">
                                <span class="flex items-center">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    {{ $news->created_at->isoFormat('D MMMM Y') }}
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-white/80"></span>
                                <span class="flex items-center">
                                    <i class="far fa-folder mr-2"></i>
                                    {{ $news->category }}
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-white/80"></span>
                                <span class="flex items-center">
                                    <i class="far fa-user mr-2"></i>
                                    {{ $news->user->name ?? 'Admin Desa' }}
                                </span>
                                <span class="flex items-center">
                                    <i class="far fa-clock mr-2"></i> {{ ceil(str_word_count(strip_tags($news->content)) / 200) }} menit baca
                                </span>
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                                {{ $news->title }}
                            </h1>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 md:p-10">
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            {!! $news->content !!}
                        </div>

                        <!-- Share Section -->
                        <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <i class="fas fa-share-alt mr-2"></i>
                                Bagikan Artikel Ini:
                            </h3>
                            <div class="flex gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                   target="_blank"
                                   class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-all duration-200 hover:scale-110">
                                    <i class="fab fa-facebook-f text-lg"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                   target="_blank" 
                                   class="flex items-center justify-center w-12 h-12 rounded-full bg-sky-400 text-white hover:bg-sky-500 transition-all duration-200 hover:scale-110">
                                    <i class="fab fa-twitter text-lg"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}"
                                   target="_blank"
                                   class="flex items-center justify-center w-12 h-12 rounded-full bg-green-500 text-white hover:bg-green-600 transition-all duration-200 hover:scale-110">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Navigation Button -->
                <div class="mt-12">
                    <!-- Back Button -->
                    <a href="{{ route('news.index') }}"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 group shadow-lg hover:shadow-xl">
                        <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                        Kembali ke Daftar Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection