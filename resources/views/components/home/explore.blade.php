<section class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 animate-fade-down">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">Jelajahi Desa Pasirpanjang</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">Temukan berbagai informasi dan layanan yang tersedia di desa kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 - Profil Desa -->
            <!-- <a href="{{ route('profile') }}" class="group">
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
            </a> -->

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

            <!-- Card 3 - Regulasi -->
            <a href="{{ route('regulations.index') }}" class="group">
                <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 600ms;">
                    <div class="p-8 text-center">
                        <div class="mb-6 text-purple-600 dark:text-purple-400 transform transition-all duration-500 group-hover:scale-110">
                    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
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


    <!-- Card 4 - Pengaduan -->
    <a href="{{ route('pengaduan.index') }}" class="group">
        <div class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl animate-fade-up h-full border border-gray-100 dark:border-gray-600" style="animation-delay: 1000ms;">
            <div class="p-8 text-center">
                <div class="mb-6 text-yellow-600 dark:text-yellow-400 transform transition-all duration-500 group-hover:scale-110">
                    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors">Pengaduan</h3>
                <p class="text-gray-600 dark:text-gray-300">Sampaikan keluhan atau masukan Anda secara langsung kepada pemerintah desa</p>
            </div>
        </div>
    </a>
        </div>
    </div>
</section>