<section id="pembangunan" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-6 lg:p-8">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 dark:text-white bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">
                Progress Pembangunan
            </h2>
            <div class="hidden lg:block">
                <div class="animate-bounce bg-gradient-to-r from-green-500 to-blue-500 w-12 h-12 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($developments ?? [] as $development)
                <div class="group relative bg-white dark:bg-gray-700 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-600">
                    <!-- Image Section -->
                    <div class="relative h-48 overflow-hidden">
                        @if($development->photo_url)
                            <img 
                                src="{{ $development->photo_url }}" 
                                alt="{{ $development->title }}" 
                                class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                            >
                        @else
                            <div class="w-full h-full bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-2
                                {{ $development->status === 'Selesai' ? 'bg-green-500/90 text-white' : 
                                   ($development->status === 'Proses' ? 'bg-yellow-500/90 text-white' : 
                                   'bg-blue-500/90 text-white') }}">
                                @if($development->status === 'Selesai')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @elseif($development->status === 'Proses')
                                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @endif
                                {{ $development->status }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 hover:text-green-600 transition-colors">
                                {{ $development->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                {{ Str::limit($development->description, 120, '...') }}
                            </p>
                        </div>

                        <!-- Timeline & Progress -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $development->start_date->format('d M Y') }} - {{ $development->end_date->format('d M Y') }}</span>
                                </div>
                                <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-md text-xs font-medium">
                                    {{ $development->progress }}% Terselesaikan
                                </span>
                            </div>

                            <!-- Animated Progress Bar -->
                            <div class="relative">
                                <div class="overflow-hidden h-3 rounded-full bg-gray-200 dark:bg-gray-600">
                                    <div class="h-full bg-gradient-to-r from-green-400 to-blue-500 rounded-full transition-all duration-500 ease-out" 
                                         style="width: {{ $development->progress }}%">
                                        <div class="h-full bg-white/10 animate-pulse"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="mt-6 text-lg font-medium text-gray-800 dark:text-gray-200">Belum ada data pembangunan</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Silakan periksa kembali nanti</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>