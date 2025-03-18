@extends('components.layout')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900">
        <!-- Hero Section dengan Background Pattern -->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <pattern id="hero-pattern" width="10" height="10" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="currentColor"/>
                    </pattern>
                    <rect width="100" height="100" fill="url(#hero-pattern)"/>
                </svg>
            </div>
            
            <div class="container mx-auto px-4 py-32 relative">
                <div class="max-w-3xl animate-fade-up">
                    <h1 class="text-5xl font-bold text-white mb-6">Data Statistik Desa Pasirpanjang</h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Informasi terkini mengenai data penduduk, APBDes, Status IDM, dan Status SDGs untuk transparansi dan akuntabilitas pembangunan desa.
                    </p>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
        </div>

        <!-- Navigation Tabs dengan Animasi -->
        <div class="sticky top-0 bg-white dark:bg-gray-800 shadow-lg z-10 transition-all duration-300">
            <div class="container mx-auto px-4">
                <nav class="flex space-x-1 overflow-x-auto" aria-label="Tabs">
                    @foreach([
                        ['id' => 'data-penduduk', 'text' => 'Data Penduduk', 'icon' => 'users'],
                        ['id' => 'apbdes', 'text' => 'APBDes', 'icon' => 'chart-pie'],
                        ['id' => 'status-idm', 'text' => 'Status IDM', 'icon' => 'chart-bar'],
                        ['id' => 'status-sdgs', 'text' => 'Status SDGs', 'icon' => 'globe']
                    ] as $tab)
                        <a href="#{{ $tab['id'] }}" 
                           class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                                  border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600
                                  dark:hover:text-blue-400 dark:hover:border-blue-400">
                            <i class="fas fa-{{ $tab['icon'] }} mr-2"></i>
                            {{ $tab['text'] }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>
        
        <!-- Content Sections dengan Card Design -->
        <div class="container mx-auto px-4 py-16">
            <!-- Data Penduduk Section -->
            <section id="data-penduduk" class="mb-24 scroll-mt-20">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                            <i class="fas fa-users text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Data Penduduk</h2>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        <div class="p-6">
                            @include('components.statistics.data-penduduk')
                        </div>
                    </div>
                </div>
            </section>

            <!-- APBDes Section -->
            <section id="apbdes" class="mb-24 scroll-mt-20">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                            <i class="fas fa-chart-pie text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">APBDes</h2>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        @include('components.statistics.apbdes')
                    </div>
                </div>
            </section>

            <!-- Status IDM Section -->
            <section id="status-idm" class="mb-24 scroll-mt-20">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center mr-4">
                            <i class="fas fa-chart-bar text-2xl text-purple-600 dark:text-purple-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Status IDM</h2>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        @include('components.statistics.status-idm')
                    </div>
                </div>
            </section>

            <!-- Status SDGs Section -->
            <section id="status-sdgs" class="mb-24 scroll-mt-20">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-orange-100 dark:bg-orange-900 flex items-center justify-center mr-4">
                            <i class="fas fa-globe text-2xl text-orange-600 dark:text-orange-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Status SDGs</h2>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                        @include('components.statistics.status-sdgs')
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    @include('components.scripts.animation')
@endsection