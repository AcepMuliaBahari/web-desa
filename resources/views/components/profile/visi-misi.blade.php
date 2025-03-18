<section id="visi-misi" class="mb-20 space-y-8 container mx-auto px-4">
    <!-- Visi -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl shadow-lg p-8 animate-fade-down border border-blue-100 dark:border-gray-600 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-blue-500 rounded-xl text-white transform rotate-12 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 dark:text-white bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">Visi</h2>
            </div>
            @if(isset($profile) && $profile->exists && $profile->updated_at)
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Diperbarui {{ $profile->updated_at->locale('id')->diffForHumans() }}
                </span>
            @endif
        </div>
        <div class="prose dark:prose-invert max-w-none text-center">
            <p class="text-gray-600 dark:text-gray-300 text-2xl leading-relaxed font-medium px-4 py-6 border-l-4 border-blue-500 bg-blue-50 dark:bg-gray-700/50 rounded-lg">
                {!! nl2br(e($profile->vision ?? '"Terwujudnya Desa Pasirpanjang Yang Maju, Sejahtera Dan Bermartabat"')) !!}
            </p>
        </div>
    </div>

    <!-- Misi -->
    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl shadow-lg p-8 animate-fade-up border border-green-100 dark:border-gray-600 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-green-500 rounded-xl text-white transform -rotate-12 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 dark:text-white bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600 dark:from-green-400 dark:to-emerald-400">Misi</h2>
            </div>
            @if(isset($profile) && $profile->exists && $profile->updated_at)
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Diperbarui {{ $profile->updated_at->locale('id')->diffForHumans() }}
                </span>
            @endif
        </div>
        <div class="prose dark:prose-invert max-w-none text-center">
            <ul class="space-y-4 text-gray-600 dark:text-gray-300">
                @if(isset($profile) && $profile->exists && isset($profile->mission))
                    @foreach(explode("\n", $profile->mission) as $missionItem)
                        @if(trim($missionItem))
                            <li class="flex items-center justify-center space-x-4 p-4 bg-white dark:bg-gray-700/50 rounded-lg hover:shadow-md transition-shadow duration-300">
                                <span class="text-lg leading-relaxed">{!! e($missionItem) !!}</span>
                            </li>
                        @endif
                    @endforeach
                @else
                    @foreach([
                        'Mewujudkan pemerintah desa yang transfaran dan terpercaya.',
                        'Menciptakan Pelayanan terbaik kepada Masyarakat',
                        'Memaksimalkan pembangunan infrastruktur desa secara merata dan terencana.',
                        'Revitalisasi wilayah terdampak bencana.',
                        'Menciptakan generasi muda yang unggul.',
                        'Meningkatkan Perekonomian dan Kesejahteraan masyarakat.',
                        'Menciptakan masyarakat yang produktif.',
                        'Meningkatkan Keamanan masyarakat.',
                        'Meningkatkan Kegiatan Keagamaan di Desa Pasirpanjang.'
                    ] as $index => $mission)
                        <li class="flex items-center justify-center space-x-4 p-4 bg-white dark:bg-gray-700/50 rounded-lg hover:shadow-md transition-shadow duration-300 group">
                            <span class="text-lg leading-relaxed">{{ ($index + 1) . '. ' . $mission }}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>