<section id="lapak" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Lapak UMKM</h2>
            <a href="{{ route('umkm.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 dark:text-green-400">
                Lihat Semua
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($umkm ?? [] as $item)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 animate-fade-up">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">{{ $item->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-2">{{ Str::limit($item->description, 100) }}</p>
                        
                        <div class="flex flex-col space-y-3">
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $item->owner_name }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span>{{ $item->contact }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-sm">{{ Str::limit($item->address, 50) }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <!-- <span class="text-green-600 dark:text-green-400 font-semibold">Rp {{ number_format($item->price, 0, ',', '.') }}</span> -->
                            <a href="{{ route('umkm.show', $item->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                Detail
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada UMKM yang terdaftar</p>
                </div>
            @endforelse
        </div>
    </div>
</section> 