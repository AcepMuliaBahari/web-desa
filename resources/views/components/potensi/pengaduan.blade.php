<section id="pengaduan" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Pengaduan Masyarakat</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Form Pengaduan -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 animate-fade-right">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Sampaikan Pengaduan</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Laporkan keluhan atau aspirasi Anda untuk Desa yang lebih baik
                </p>
                <div class="space-y-4">
                    @auth
                        <a href="{{ route('complaints.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Buat Pengaduan Baru
                        </a>
                    @else
                        <div class="text-center">
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Silakan login terlebih dahulu untuk membuat pengaduan</p>
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Login
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Status Pengaduan -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 animate-fade-left">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Status Pengaduan</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Pantau status pengaduan yang telah Anda sampaikan
                </p>
                @auth
                    <a href="{{ route('complaints.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Lihat Pengaduan Saya
                    </a>
                @else
                    <div class="text-center">
                        <p class="text-gray-500 dark:text-gray-400">Login untuk melihat status pengaduan Anda</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section> 