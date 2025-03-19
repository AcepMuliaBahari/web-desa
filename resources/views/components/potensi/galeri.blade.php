<section id="galeri" class="py-16 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center mb-12 text-center">
            <h2 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-green-500 dark:from-blue-400 dark:to-green-300 mb-4">
                Galeri Desa
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Jelajahi keindahan dan kehidupan Desa Pasirpanjang melalui koleksi foto dan video kami
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($galleries ?? [] as $gallery)
                <a href="{{ route('potentials.gallery.show', $gallery) }}" 
                   class="group bg-gray-50 dark:bg-gray-700 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 animate-fade-up">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        @if($gallery->type === 'video')
                            <video class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                   poster="{{ Storage::url($gallery->file_path) }}"
                                   muted>
                                <source src="{{ Storage::url($gallery->file_path) }}" type="video/mp4">
                            </video>
                            <!-- Ikon Play untuk Video -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 flex items-center justify-center rounded-full bg-black bg-opacity-50 text-white group-hover:bg-opacity-75 transition-all duration-300">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        @else
                            <img src="{{ Storage::url($gallery->file_path) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @endif
                        
                        <!-- Badge untuk tipe konten -->
                        <div class="absolute top-3 left-3">
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $gallery->type === 'video' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' }}">
                                {{ $gallery->type === 'video' ? 'Video' : 'Foto' }}
                            </span>
                        </div>
                    </div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-2 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 line-clamp-1">
                                {{ $gallery->title }}
                            </h3>
                            <p class="text-sm text-gray-200 line-clamp-2 mb-3">
                                {{ $gallery->description }}
                            </p>
                            <div class="flex items-center text-sm text-gray-300">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $gallery->created_at->locale('id')->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full min-h-[400px] flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-800 rounded-2xl p-8">
                    <div class="w-24 h-24 mb-6 text-gray-300 dark:text-gray-600">
                        <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Galeri Masih Kosong</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-center max-w-md">
                        Foto dan video kegiatan desa akan segera ditampilkan di sini
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section> 