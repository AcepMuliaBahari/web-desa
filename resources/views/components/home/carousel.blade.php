<div class="flex flex-col md:flex-row gap-6 container mx-auto px-4 py-4">
    <!-- Carousel Section - Half Width -->
    <div class="w-full md:w-full">
        <div id="hero-carousel" class="relative h-[500px]" data-carousel="slide" data-carousel-interval="5000">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden rounded-lg">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item="active">
                    <img src="{{ asset('images/cara/1.jpeg') }}" 
                         class="absolute block w-full h-full object-cover" 
                         alt="Slide 1">
                    <!-- Hero Content 1 -->
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/70">
                        <div class="relative flex items-center justify-center h-full px-4">
                            <div class="text-center text-white">
                                <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fade-down">
                                    Selamat Datang di Desa Pasirpanjang
                                </h2>
                                <p class="text-lg md:text-xl mb-6 animate-fade-up">
                                    Membangun Desa Menuju Masyarakat yang Sejahtera
                                </p>
                                <a href="{{ route('profile') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 animate-fade-up">
                                    Profil Desa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <img src="{{ asset('images/cara/2.jpeg') }}" 
                         class="absolute block w-full h-full object-cover" 
                         alt="Slide 2">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/70">
                        <div class="relative flex items-center justify-center h-full px-4">
                            <div class="text-center text-white">
                                <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fade-down">
                                    Potensi Desa
                                </h2>
                                <p class="text-lg md:text-xl mb-6 animate-fade-up">
                                    
                                </p>
                                <a href="{{ route('potentials.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 animate-fade-up">
                                    Jelajahi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <img src="{{ asset('images/cara/3.jpeg') }}" 
                         class="absolute block w-full h-full object-cover" 
                         alt="Slide 3">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/70">
                        <div class="relative flex items-center justify-center h-full px-4">
                            <div class="text-center text-white">
                                <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fade-down">
                                    Layanan Publik
                                </h2>
                                <p class="text-lg md:text-xl mb-6 animate-fade-up">
                                    Melayani Masyarakat dengan Sepenuh Hati
                                </p>
                                <a href="#layanan" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 animate-fade-up">
                                    Lihat Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-1/2 left-4 z-30 flex items-center justify-center h-8 w-8 bg-white/30 hover:bg-white/50 rounded-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </button>
            <button type="button" class="absolute top-1/2 right-4 z-30 flex items-center justify-center h-8 w-8 bg-white/30 hover:bg-white/50 rounded-full cursor-pointer group focus:outline-none" data-carousel-next>
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </button>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-2 h-2 rounded-full bg-white/50 hover:bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-2 h-2 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-2 h-2 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
        </div>
    </div>


</div>
