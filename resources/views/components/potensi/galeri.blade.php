<section id="galeri" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Galeri Desa</h2>
            <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 dark:text-green-400 transition-colors duration-200">
                Lihat Semua
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-1 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors duration-200">
                            {{ $gallery->title }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                            {{ $gallery->description }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $gallery->created_at->locale('id')->diffForHumans() }}
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-lg font-medium text-gray-500 dark:text-gray-400">Belum ada konten di galeri</p>
                    <p class="text-sm text-gray-400 dark:text-gray-500">Foto dan video akan ditampilkan di sini</p>
                </div>
            @endforelse
        </div>
    </div>
</section> 