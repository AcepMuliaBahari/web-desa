<section class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 animate-fade-down">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">Jelajahi Desa Pasirpanjang</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">Temukan berbagai informasi dan layanan yang tersedia di desa kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 - Profil Desa -->
            <a href="{{ route('profile') }}" class="group">
                <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 200ms;">
                    <div class="p-8 text-center">
                        <div class="mb-6 text-blue-600 dark:text-blue-400 transform transition-all duration-500 group-hover:scale-110">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Profil Desa</h3>
                        <p class="text-gray-600 dark:text-gray-300">Kenali lebih dekat sejarah, visi-misi, dan struktur pemerintahan Desa Pasirpanjang</p>
                    </div>
                </div>
            </a>

            <!-- Card 2 - Potensi Desa -->
            <a href="{{ route('potentials.index') }}" class="group">
                <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 400ms;">
                    <div class="p-8 text-center">
                        <div class="mb-6 text-green-600 dark:text-green-400 transform transition-all duration-500 group-hover:scale-110">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Potensi Desa</h3>
                        <p class="text-gray-600 dark:text-gray-300">Jelajahi kekayaan alam, budaya, dan potensi ekonomi yang dimiliki desa kami</p>
                    </div>
                </div>
            </a>

            <!-- Card 3 - Layanan -->
            <a href="{{ route('regulations.index') }}" class="group">
                <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 600ms;">
                    <div class="p-8 text-center">
                        <div class="mb-6 text-purple-600 dark:text-purple-400 transform transition-all duration-500 group-hover:scale-110">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Regulasi</h3>
                        <p class="text-gray-600 dark:text-gray-300">Akses berbagai Regulasi desa</p>
                    </div>
                </div>
            </a>

            <!-- Card 4 - Berita -->
            <a href="{{ route('news.index') }}" class="group">
                <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 800ms;">
                    <div class="p-8 text-center">
                        <div class="mb-6 text-red-600 dark:text-red-400 transform transition-all duration-500 group-hover:scale-110">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">Berita Terkini</h3>
                        <p class="text-gray-600 dark:text-gray-300">Dapatkan informasi dan berita terbaru seputar kegiatan di desa kami</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>