@extends('components.layout')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900">
        <!-- Hero Section dengan Pattern Background -->
        <div class="relative bg-gradient-to-r from-green-500 to-green-700 dark:from-green-600 dark:to-green-800">
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
                    <h1 class="text-5xl font-bold text-white mb-6">Potensi Desa Pasirpanjang</h1>
                    <p class="text-xl text-green-100 leading-relaxed">
                        Jelajahi berbagai potensi dan keunggulan yang dimiliki Desa Pasirpanjang dalam pengembangan ekonomi, pariwisata, dan pembangunan berkelanjutan.
                    </p>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
        </div>

        <!-- Navigation Tabs dengan Icon -->
        <div class="sticky top-0 bg-white dark:bg-gray-800 shadow-lg z-10 transition-all duration-300">
            <div class="container mx-auto px-4">
                <nav class="flex space-x-1 overflow-x-auto" aria-label="Tabs">
                    <a href="#lapak" 
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-green-600 hover:border-green-600
                              dark:hover:text-green-400 dark:hover:border-green-400">
                        <i class="fas fa-store mr-2"></i>
                        Lapak UMKM
                    </a>
                    <a href="#galeri"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-green-600 hover:border-green-600
                              dark:hover:text-green-400 dark:hover:border-green-400">
                        <i class="fas fa-images mr-2"></i>
                        Galeri
                    </a>
                    <a href="#pembangunan"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-green-600 hover:border-green-600
                              dark:hover:text-green-400 dark:hover:border-green-400">
                        <i class="fas fa-building mr-2"></i>
                        Pembangunan
                    </a>
                    <a href="#pengaduan"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-green-600 hover:border-green-600
                              dark:hover:text-green-400 dark:hover:border-green-400">
                        <i class="fas fa-comment-alt mr-2"></i>
                        Pengaduan
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Content Sections dengan Animasi -->
        <div class="container mx-auto px-4 py-16">
            <!-- Lapak UMKM Section -->
            <section id="lapak" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                            <i class="fas fa-store text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Lapak UMKM</h2>
                    </div>
                    @include('components.potensi.lapak')
                </div>
            </section>

            <!-- Galeri Section -->
            <section id="galeri" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                            <i class="fas fa-images text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Galeri</h2>
                    </div>
                    @include('components.potensi.galeri')
                </div>
            </section>

            <!-- Pembangunan Section -->
            <section id="pembangunan" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                            <i class="fas fa-building text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Pembangunan</h2>
                    </div>
                    @include('components.potensi.pembangunan')
                </div>
            </section>

            <!-- Pengaduan Section -->
            {{-- <section id="pengaduan" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-4">
                            <i class="fas fa-comment-alt text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Pengaduan</h2>
                    </div>
                    @include('components.potensi.pengaduan')
                </div>
            </section> --}}
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
@endsection