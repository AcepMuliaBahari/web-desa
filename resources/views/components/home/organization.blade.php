<section class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white animate-fade-down">Struktur Organisasi dan Tata Kerja</h2>
        
        <!-- SOTK Chart -->
        <div class="max-w-5xl mx-auto mb-12 animate-fade bg-white dark:bg-gray-700 rounded-2xl shadow-2xl p-8 border border-gray-100 dark:border-gray-600">
            <div class="relative group cursor-pointer">
                <img id="orgChart" src="{{ asset('images/organisasi/1.png') }}" alt="Struktur Organisasi" class="w-full h-auto rounded-xl" onclick="openFullscreen(this.src)">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center rounded-xl">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                        <button onclick="openFullscreen('{{ asset('images/organisasi/1.png') }}')" class="bg-white/90 hover:bg-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:stroke-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <a href="{{ asset('images/organisasi/1.png') }}" download class="bg-white/90 hover:bg-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:stroke-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk tampilan fullscreen -->
        <div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 cursor-pointer" onclick="closeFullscreen()">
            <div class="absolute top-4 right-4 flex gap-2">
                <a id="downloadBtn" href="" download class="bg-white/10 hover:bg-white/20 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
                <button onclick="closeFullscreen()" class="bg-white/10 hover:bg-white/20 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <img id="fullscreenImage" src="" alt="Struktur Organisasi Fullscreen" class="max-h-screen max-w-screen p-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        </div>

        <!-- Perangkat Desa Grid -->
        <div class="bg-gradient-to-br from-blue-100 via-white to-blue-50 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800 rounded-2xl shadow-2xl p-8 transition-all duration-300 hover:shadow-3xl border border-blue-100 dark:border-gray-600">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white animate-fade-right">
                    <i class="fas fa-users mr-2 text-blue-600 dark:text-blue-400"></i>
                    Perangkat Desa
                </h3>
            </div>

            <div class="relative overflow-hidden">
                <div id="officialCarousel" class="flex transition-transform duration-500 ease-in-out">
                    @php
                        $currentIndex = 0; // Inisialisasi currentIndex
                    @endphp
                    @forelse($officials ?? [] as $official)
                    <div class="flex-none w-64 mx-4">
                        <div class="bg-gradient-to-br from-blue-200 to-white dark:from-gray-600 dark:to-gray-700 rounded-xl p-6 text-center animate-fade-up hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-blue-100 dark:border-gray-500" style="animation-delay: {{ $loop->iteration * 200 }}ms;">
                            <div class="relative mb-4 group">
                                <img src="{{ $official->photo_url }}" alt="{{ $official->name }}" class="w-32 h-32 rounded-lg mx-auto object-cover transition-all duration-300 shadow-lg 
                                {{ $loop->index === $currentIndex ? 'scale-125' : 'scale-100' }}">
                                <div class="absolute inset-0 rounded-lg bg-indigo-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white 
                            {{ $loop->index === $currentIndex ? 'text-xl' : 'text-lg' }}">{{ $official->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 
                            {{ $loop->index === $currentIndex ? 'text-lg' : 'text-base' }}">{{ $official->position }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center text-gray-500 dark:text-gray-400">
                        Belum ada data pejabat desa yang aktif
                    </div>
                    @endforelse
                </div>

                <!-- Tombol Navigasi -->
                <button type="button" class="absolute top-1/2 left-4 z-30 flex items-center justify-center h-10 w-10 bg-blue-500/50 hover:bg-blue-600/50 rounded-full cursor-pointer group focus:outline-none" onclick="prevSlide()">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </button>
                <button type="button" class="absolute top-1/2 right-4 z-30 flex items-center justify-center h-10 w-10 bg-blue-500/50 hover:bg-blue-600/50 rounded-full cursor-pointer group focus:outline-none" onclick="nextSlide()">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </button>
            </div>
        </div>

        <script>
            const officialCarousel = document.getElementById('officialCarousel');
            const officials = document.querySelectorAll('#officialCarousel > div');
            let currentIndex = 0;

            function prevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }

            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
            }
            
            const totalSlides = officials.length;
            const autoplayDelay = 3000; // Waktu delay dalam milidetik (3 detik)

            function updateCarousel() {
                const slideWidth = 272; // 256px (w-64) + 16px (mx-4)
                officialCarousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                
                // Perbarui tampilan slide aktif
                officials.forEach((official, index) => {
                    const image = official.querySelector('img');
                    const title = official.querySelector('h3');
                    const position = official.querySelector('p');
                    
                    if (index === currentIndex) {
                        image.classList.add('scale-125');
                        title.classList.add('text-xl');
                        position.classList.add('text-lg');
                        official.classList.add('z-10');
                    } else {
                        image.classList.remove('scale-125');
                        title.classList.remove('text-xl');
                        position.classList.remove('text-lg');
                        official.classList.remove('z-10');
                    }
                });
            }

            function autoplayCarousel() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }

            // Mulai autoplay
            let autoplayInterval = setInterval(autoplayCarousel, autoplayDelay);

            // Hentikan autoplay saat hover
            officialCarousel.addEventListener('mouseenter', () => {
                clearInterval(autoplayInterval);
            });

            // Lanjutkan autoplay setelah hover selesai
            officialCarousel.addEventListener('mouseleave', () => {
                autoplayInterval = setInterval(autoplayCarousel, autoplayDelay);
            });

            // Update carousel pertama kali
            updateCarousel();
        </script>

        <script>
            function openFullscreen(imageSrc) {
                document.getElementById('fullscreenModal').classList.remove('hidden');
                document.getElementById('fullscreenImage').src = imageSrc;
                document.getElementById('downloadBtn').href = imageSrc;
            }

            function closeFullscreen() {
                document.getElementById('fullscreenModal').classList.add('hidden');
            }
        </script>
    </div>
</section>