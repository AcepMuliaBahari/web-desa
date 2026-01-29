    <!-- News Section - Half Width -->
    <div class="w-full md:w-1/2"> 
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 transition-all duration-300 hover:shadow-2xl">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white animate-fade-right flex items-center">
                    <i class="fas fa-bullhorn text-blue-600 dark:text-blue-400 mr-3 text-3xl"></i>
                    <span class="border-b-2 border-blue-600 dark:border-blue-400 pb-1">Berita Terkini</span>
                </h2>
                
                <div class="flex items-center gap-3">
                    <div class="flex gap-1">
                        <button id="prevBtn" class="p-2 rounded-full bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 text-blue-600 dark:text-blue-400 transition-all duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="nextBtn" class="p-2 rounded-full bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 text-blue-600 dark:text-blue-400 transition-all duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <a href="{{ route('news.index') }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-all duration-200">
                        <span>Lihat Semua</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i> 
                    </a>
                </div>
            </div>

            <!-- News Carousel -->
            <div class="relative overflow-hidden rounded-xl">
                <div id="newsCarousel" class="flex transition-transform duration-500 ease-in-out">
                    @forelse(app(\App\Http\Controllers\NewsController::class)->getLatestNews() as $news)
                        <div class="w-full flex-shrink-0 group animate-fade-up" style="animation-delay: {{ $loop->iteration * 200 }}ms">
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl overflow-hidden flex flex-col h-full">
                                <a href="{{ route('news.show', $news) }}" class="block relative overflow-hidden aspect-video">
                                    <img src="{{ $news->photo ? asset('storage/' . $news->photo) : asset('images/news-placeholder.jpg') }}" 
                                         alt="{{ $news->title }}" 
                                         class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </a>
                                
                                <div class="p-4 flex flex-col flex-grow">
                                    <div class="flex-grow">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="px-2 py-0.5 text-xs font-medium bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-300 rounded-full">
                                                {{ $news->category }}
                                            </span>
                                        </div>
                                        
                                        <a href="{{ route('news.show', $news) }}" class="block group">
                                            <h3 class="text-lg font-bold text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200 line-clamp-2" style="min-height: 3.5rem;">
                                                {{ $news->title }}
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-2" style="min-height: 2.5rem;">
                                                {{ Str::limit(strip_tags($news->content), 100) }}
                                            </p>
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('news.show', $news) }}" class="inline-flex items-center text-sm text-blue-600 dark:text-blue-400 font-medium group">
                                            <span>Baca selengkapnya</span>
                                            <i class="fas fa-arrow-right ml-1 transform transition-transform duration-200 group-hover:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-10 text-gray-500 dark:text-gray-400">
                            Belum ada berita untuk ditampilkan.
                        </div>
                    @endforelse
                </div>

                <!-- Carousel Indicators -->
                <div class="flex justify-center mt-4 gap-1">
                    @foreach(app(\App\Http\Controllers\NewsController::class)->getLatestNews() as $news)
                        <button class="carousel-indicator w-2 h-2 rounded-full bg-gray-300 dark:bg-gray-600 hover:bg-blue-400 dark:hover:bg-blue-500 transition-colors duration-200" data-index="{{ $loop->index }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('newsCarousel');
            if (!carousel) return;

            const items = carousel.children;
            const indicators = document.querySelectorAll('.carousel-indicator');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;
            let intervalId;

            if (items.length <= 1) return;

            // Set initial state
            updateCarousel();
            indicators[0].classList.add('bg-blue-600', 'dark:bg-blue-400');

            function updateCarousel() {
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    if(index === currentIndex) {
                        indicator.classList.add('bg-blue-600', 'dark:bg-blue-400');
                        indicator.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                    } else {
                        indicator.classList.remove('bg-blue-600', 'dark:bg-blue-400');
                        indicator.classList.add('bg-gray-300', 'dark:bg-gray-600');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length;
                updateCarousel();
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateCarousel();
            }

            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentIndex = index;
                    updateCarousel();
                    resetInterval();
                });
            });

            function startInterval() {
                intervalId = setInterval(nextSlide, 5000);
            }

            function resetInterval() {
                clearInterval(intervalId);
                startInterval();
            }

            startInterval();
        });
    </script>