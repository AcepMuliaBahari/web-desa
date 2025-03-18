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
                        <span class="text-gray-500 dark:text-gray-400">Berita</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="text-center mb-12 animate-fade-up">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Berita Terkini</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Temukan informasi dan berita terbaru seputar desa kami</p>
        </div>

        <!-- Filter Section -->
        <div class="mb-8 animate-fade-up">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4">
                <form action="{{ route('news.index') }}" method="GET" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                               placeholder="Cari berita...">
                    </div>
                    <div class="w-full sm:w-auto">
                        <select name="category" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Cari
                    </button>
                </form>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-up">
            @forelse($news as $item)
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700 relative group">
                        <img src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('images/news-placeholder.jpg') }}"
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/0 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 right-3">
                            <span class="inline-block px-3 py-1 bg-primary-600 text-white text-sm rounded-full">
                                {{ $item->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 line-clamp-2">
                            {{ $item->title }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($item->content), 150) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ $item->created_at->isoFormat('D MMMM Y') }}
                            </span>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('news.show', $item) }}" 
                                   class="inline-flex items-center text-primary-600 hover:text-primary-700 dark:text-primary-500 dark:hover:text-primary-400">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                                </a>
                                <a href="{{ route('news.index') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
                        <i class="fas fa-newspaper text-4xl text-gray-400 dark:text-gray-600 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tidak Ada Berita</h3>
                        <p class="text-gray-600 dark:text-gray-400">Belum ada berita yang dipublikasikan saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection 