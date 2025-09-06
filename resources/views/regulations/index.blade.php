@extends('components.layout')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-green-500 to-green-700 dark:from-green-600 dark:to-green-800">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <pattern id="hero-pattern" width="10" height="10" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="currentColor" />
                    </pattern>
                    <rect width="100" height="100" fill="url(#hero-pattern)" />
                </svg>
            </div>

            <div class="container mx-auto px-6 py-10 relative">
                <div class="max-w-3xl text-center animate-fade-up">
                    <h2 class="text-5lg font-bold text-white mb-6 leading-tight">
                        Informasi Regulasi Desa
                    </h2>
                    <p class="text-lg text-green-100 leading-relaxed">
                        Temukan peraturan desa, dokumen hukum, dan regulasi resmi yang mendukung kemajuan Desa Pasirpanjang.
                    </p>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
        </div>

        <!-- Navigation Tabs -->
        <div class="sticky top-0 bg-white dark:bg-gray-800 shadow-md z-10">
            <div class="container mx-auto px-6">
                <nav class="flex space-x-2 overflow-x-auto" aria-label="Tabs">
                    <a href="#perdes"
                       class="group flex items-center px-5 py-3 text-sm font-medium text-gray-600 border-b-2 border-transparent
                              hover:text-green-600 hover:border-green-600 dark:text-gray-300 dark:hover:text-green-400 dark:hover:border-green-400 transition-all duration-200">
                        <i class="fas fa-book mr-2"></i> Peraturan Desa
                    </a>
                    <a href="#produk-hukum"
                       class="group flex items-center px-5 py-3 text-sm font-medium text-gray-600 border-b-2 border-transparent
                              hover:text-green-600 hover:border-green-600 dark:text-gray-300 dark:hover:text-green-400 dark:hover:border-green-400 transition-all duration-200">
                        <i class="fas fa-gavel mr-2"></i> Produk Hukum
                    </a>
                    <a href="#informasi-publik"
                       class="group flex items-center px-5 py-3 text-sm font-medium text-gray-600 border-b-2 border-transparent
                              hover:text-green-600 hover:border-green-600 dark:text-gray-300 dark:hover:text-green-400 dark:hover:border-green-400 transition-all duration-200">
                        <i class="fas fa-info-circle mr-2"></i> Informasi Publik
                    </a>
                </nav>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="container mx-auto px-6 py-16">
            <!-- Peraturan Desa Section -->
            <section id="perdes" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 mr-4">
                            <i class="fas fa-book text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Peraturan Desa
                        </h2>
                    </div>
                    @include('components.regulations.perdes')
                </div>
            </section>

            <!-- Produk Hukum Section -->
            <section id="produk-hukum" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 mr-4">
                            <i class="fas fa-gavel text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Produk Hukum
                        </h2>
                    </div>
                    @include('components.regulations.produk-hukum')
                </div>
            </section>

            <!-- Informasi Publik Section -->
            <section id="informasi-publik" class="mb-24 scroll-mt-20 animate-fade-up">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 mr-4">
                            <i class="fas fa-info-circle text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Informasi Publik
                        </h2>
                    </div>
                    @include('components.regulations.informasi-publik')
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
