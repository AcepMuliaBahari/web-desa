<section id="lapak" class="mb-28">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 relative overflow-hidden">
        <!-- Gradient border effect -->
        <div class="absolute inset-0 border-2 border-transparent group-hover:border-green-500/10 dark:group-hover:border-green-400/10 rounded-2xl transition-all duration-500 pointer-events-none"></div>
        
        <div class="flex justify-between items-center mb-8 pb-4 border-b-2 border-green-500/20 dark:border-green-400/20">
            <div>
                <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-2 relative">
                    <span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">Lapak UMKM</span>
                    <span class="absolute bottom-0 left-0 w-16 h-1 bg-green-500 rounded-full"></span>
                </h2>
                <p class="text-gray-600 dark:text-gray-300">Dukung produk lokal terbaik kami</p>
            </div>
            <a href="{{ route('umkm.index') }}" class="group flex items-center space-x-2 px-6 py-2.5 bg-green-500/10 hover:bg-green-500/20 dark:bg-green-400/10 dark:hover:bg-green-400/20 rounded-full transition-all duration-300">
                <span class="text-green-600 dark:text-green-400 font-semibold">Lihat Semua</span>
                <div class="w-8 h-8 bg-green-500 dark:bg-green-400 rounded-full flex items-center justify-center transform group-hover:translate-x-1 transition-transform duration-300">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($umkm ?? [] as $item)
                <div class="group bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <!-- Image with hover overlay -->
                    <div class="relative overflow-hidden">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-full h-52 object-cover transform transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 truncate">{{ $item->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">{{ Str::limit($item->description, 100) }}</p>
                        
                        <div class="space-y-3.5">
                            <!-- Info Items -->
                            @foreach([
                                ['icon' => 'user', 'text' => $item->owner_name],
                                ['icon' => 'phone', 'text' => $item->contact],
                                ['icon' => 'map', 'text' => Str::limit($item->address, 50)]
                            ] as $info)
                                <div class="flex items-center text-gray-600 dark:text-gray-300">
                                    <div class="w-8 h-8 rounded-lg bg-green-500/10 dark:bg-green-400/10 flex items-center justify-center mr-3">
                                        @if($info['icon'] === 'user')
                                            <svg class="w-4 h-4 text-green-500 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        @elseif($info['icon'] === 'phone')
                                            <svg class="w-4 h-4 text-green-500 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        @elseif($info['icon'] === 'map')
                                            <svg class="w-4 h-4 text-green-500 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <span class="text-sm flex-1">{{ $info['text'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Hover effect line -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-200/50 dark:border-gray-600">
                            <a href="{{ route('umkm.show', $item->id) }}" class="group flex items-center justify-between px-4 py-2.5 bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                                <span>Lihat Detail</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 mx-auto mb-6 text-gray-400 dark:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl text-gray-500 dark:text-gray-400 mb-2">Belum ada UMKM terdaftar</h3>
                        <p class="text-gray-400 dark:text-gray-500">Segera hadir...</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>