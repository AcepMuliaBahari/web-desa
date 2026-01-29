@extends('components.layout')


@section('content')
    <div class="bg-gray-50 dark:bg-gray-900">
        <!-- Hero Section dengan Pattern Background -->
        <div class="relative bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-600 dark:to-blue-800">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <pattern id="hero-pattern" width="10" height="10" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="currentColor"/>
                    </pattern>
                    <rect width="100" height="100" fill="url(#hero-pattern)"/>
                </svg>
            </div>
            
            <div class="container mx-auto px-4 py-10 relative">
                <div class="max-w-3xl animate-fade-up">
                    <h2 class="text-5lg font-bold text-white mb-6">Profil Desa </h2>
                    <p class="text-lg text-blue-100 leading-relaxed">
                        Mengenal lebih dekat sejarah, visi, misi, dan perkembangan Desa dalam membangun masyarakat yang sejahtera dan berkelanjutan.
                    </p>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
        </div>

        <!-- Navigation Tabs dengan Icon -->
        <div class="sticky top-0 bg-white dark:bg-gray-800 shadow-lg z-10 transition-all duration-300">
            <div class="container mx-auto px-4">
                <nav class="flex space-x-1 overflow-x-auto" aria-label="Tabs">
                    <a href="#visi-misi" 
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600
                              dark:hover:text-blue-400 dark:hover:border-blue-400">
                        <i class="fas fa-bullseye mr-2"></i>
                        Visi & Misi
                    </a>
                    <a href="#sejarah"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600
                              dark:hover:text-blue-400 dark:hover:border-blue-400">
                        <i class="fas fa-history mr-2"></i>
                        Sejarah
                    </a>
                    <a href="#sotk"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600
                              dark:hover:text-blue-400 dark:hover:border-blue-400">
                        <i class="fas fa-users mr-2 text-blue-600 dark:text-blue-400"></i>
                        SOTK
                    </a>
                    <a href="#lokasi"
                       class="group flex items-center px-6 py-4 text-sm font-medium transition-all duration-200
                              border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600
                              dark:hover:text-blue-400 dark:hover:border-blue-400">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Lokasi
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Content Sections -->
        <div class="container mx-auto px-4 py-16">
            <!-- Visi & Misi Section -->
            <section id="visi-misi" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Visi & Misi</h2>
                    </div>
                    @include('components.profile.visi-misi')
                </div>
            </section>

            <!-- Sejarah Section -->
            <section id="sejarah" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                            <i class="fas fa-history text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Sejarah</h2>
                    </div>
                    @include('components.profile.sejarah')
                </div>
            </section>
            <!-- SOTK Section -->
            <section id="sotk" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    @include('components.home.organization')
                </div>
            </section>

            <!-- Lokasi Section -->
            <section id="lokasi" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Lokasi</h2>
                    </div>
                    @include('components.profile.lokasi')
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
@endsection