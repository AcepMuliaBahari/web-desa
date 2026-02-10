<section class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white animate-fade-down">Struktur Organisasi dan Tata Kerja</h2>
        
        <div class="max-w-5xl mx-auto mb-12 animate-fade bg-white dark:bg-gray-700 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-600">
            <div class="relative group cursor-pointer">
                <img id="orgChart" src="{{ asset('images/organisasi/1.png') }}" alt="Struktur Organisasi" 
                     class="w-full h-auto rounded-xl" 
                     loading="lazy" decoding="async"
                     onclick="openFullscreen(this.src)">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center rounded-xl">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                        <button onclick="openFullscreen('{{ asset('images/organisasi/1.png') }}')" class="bg-white/90 hover:bg-white p-2 rounded-full shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:stroke-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <a href="{{ asset('images/organisasi/1.png') }}" download class="bg-white/90 hover:bg-white p-2 rounded-full shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:stroke-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-95 hidden z-[60] cursor-pointer" onclick="closeFullscreen()">
            <div class="absolute top-4 right-4 flex gap-2 z-[70]">
                <a id="downloadBtn" href="" download class="bg-white/10 hover:bg-white/20 p-2 rounded-full transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
                <button onclick="closeFullscreen()" class="bg-white/10 hover:bg-white/20 p-2 rounded-full transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
            </div>
            <img id="fullscreenImage" src="" alt="Struktur Organisasi Fullscreen" class="h-full w-full object-contain p-4">
        </div>

        <div class="bg-gradient-to-br from-blue-100 via-white to-blue-50 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800 rounded-2xl shadow-xl p-8 border border-blue-100 dark:border-gray-600 overflow-hidden">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                    <i class="fas fa-users mr-2 text-blue-600 dark:text-blue-400"></i>
                    Perangkat Desa
                </h3>
            </div>

            <div class="relative w-full">
                <div id="officialCarousel" class="flex transition-transform duration-500 ease-out will-change-transform items-center py-4">
                    @forelse($officials ?? [] as $index => $official)
                    <div class="official-card flex-none w-64 mx-4 transition-all duration-500" data-index="{{ $index }}">
                        <div class="bg-gradient-to-br from-blue-200 to-white dark:from-gray-600 dark:to-gray-700 rounded-xl p-6 text-center border border-blue-100 dark:border-gray-500 shadow-sm hover:shadow-md">
                            <div class="relative mb-4 group">
                                <img src="{{ $official->photo_url }}" alt="{{ $official->name }}" 
                                     loading="lazy"
                                     class="official-img w-32 h-32 rounded-lg mx-auto object-cover transition-transform duration-500 shadow-md">
                                <div class="absolute inset-0 rounded-lg bg-indigo-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                            </div>
                            <h3 class="official-name text-lg font-semibold text-gray-800 dark:text-white transition-all duration-300 truncate px-1">{{ $official->name }}</h3>
                            <p class="official-pos text-gray-600 dark:text-gray-300 text-sm transition-all duration-300 truncate">{{ $official->position }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center text-gray-500 dark:text-gray-400 py-10">
                        Belum ada data pejabat desa yang aktif
                    </div>
                    @endforelse
                </div>

                <button type="button" class="absolute top-1/2 -left-2 transform -translate-y-1/2 z-20 flex items-center justify-center h-10 w-10 bg-blue-600/80 hover:bg-blue-600 text-white rounded-full shadow-lg transition-colors focus:outline-none" onclick="prevSlide()" aria-label="Previous">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button type="button" class="absolute top-1/2 -right-2 transform -translate-y-1/2 z-20 flex items-center justify-center h-10 w-10 bg-blue-600/80 hover:bg-blue-600 text-white rounded-full shadow-lg transition-colors focus:outline-none" onclick="nextSlide()" aria-label="Next">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>

        <style>
            /* Default state */
            .official-card { opacity: 0.7; transform: scale(0.95); }
            
            /* Active State - handled via class */
            .official-card.active-slide { 
                opacity: 1; 
                transform: scale(1);
                z-index: 10;
            }
            .official-card.active-slide .official-img { transform: scale(1.15); }
            .official-card.active-slide .official-name { font-size: 1.25rem; color: #1d4ed8; } /* text-xl & blue */
            .official-card.active-slide .official-pos { font-size: 1rem; }
            
            /* Dark mode adjustment if needed */
            .dark .official-card.active-slide .official-name { color: #60a5fa; }
        </style>

        <script>
            // Carousel Logic Optimized
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.getElementById('officialCarousel');
                if(!track) return;
                
                const cards = Array.from(track.getElementsByClassName('official-card'));
                const totalSlides = cards.length;
                
                if (totalSlides === 0) return;

                let currentIndex = 0;
                const slideWidth = 288; // 256px (w-64) + 32px (mx-4 * 2) -> pastikan sesuai margin
                
                // Function to update visuals using ClassList (Faster than inline styles)
                function updateCarousel() {
                    // 1. Move the track
                    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                    
                    // 2. Set active class
                    // Kita hapus class active dari semua, lalu tambahkan ke yang aktif
                    // Menggunakan requestAnimationFrame untuk performa visual yang lebih baik
                    requestAnimationFrame(() => {
                        cards.forEach((card, index) => {
                            if (index === currentIndex) {
                                card.classList.add('active-slide');
                            } else {
                                card.classList.remove('active-slide');
                            }
                        });
                    });
                }

                window.prevSlide = function() {
                    if(currentIndex > 0) {
                        currentIndex--;
                    } else {
                        currentIndex = totalSlides - 1; // Loop ke belakang
                    }
                    updateCarousel();
                    resetTimer();
                }

                window.nextSlide = function() {
                    if(currentIndex < totalSlides - 1) {
                        currentIndex++;
                    } else {
                        currentIndex = 0; // Loop ke depan
                    }
                    updateCarousel();
                    resetTimer();
                }

                // Autoplay Logic
                let autoplayInterval;
                const startAutoplay = () => {
                    autoplayInterval = setInterval(() => {
                        window.nextSlide();
                    }, 3000);
                };

                const stopAutoplay = () => clearInterval(autoplayInterval);
                const resetTimer = () => {
                    stopAutoplay();
                    startAutoplay();
                };

                // Event Listeners for Pause on Hover
                track.parentElement.addEventListener('mouseenter', stopAutoplay);
                track.parentElement.addEventListener('mouseleave', startAutoplay);

                // Init
                updateCarousel();
                startAutoplay();
            });

            // Modal Logic
            function openFullscreen(src) {
                const modal = document.getElementById('fullscreenModal');
                const img = document.getElementById('fullscreenImage');
                const dl = document.getElementById('downloadBtn');
                
                img.src = src;
                dl.href = src;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling background
            }

            function closeFullscreen() {
                const modal = document.getElementById('fullscreenModal');
                modal.classList.add('hidden');
                document.body.style.overflow = ''; // Restore scrolling
                
                // Clear src to save memory when closed
                setTimeout(() => {
                    document.getElementById('fullscreenImage').src = '';
                }, 300);
            }
        </script>
    </div>
</section>