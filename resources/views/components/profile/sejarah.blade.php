<section id="sejarah" class="mb-20">
    <div class="bg-gradient-to-br from-orange-50 to-rose-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl shadow-lg p-8 animate-fade-up border border-orange-100 dark:border-gray-600 hover:shadow-xl transition-all duration-300">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-orange-500 rounded-lg text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Sejarah Desa</h2>
                </div>
                @if(isset($profile) && $profile->exists && $profile->updated_at)
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Diperbarui {{ $profile->updated_at->locale('id')->diffForHumans() }}
                    </span>
                @endif
            </div>

            <!-- Konten -->
            <div class="prose dark:prose-invert max-w-none">
                <div class="text-gray-600 dark:text-gray-300 space-y-6">
                    @if(isset($profile) && $profile->exists && isset($profile->history))
                        @foreach(explode("\n\n", $profile->history) as $paragraph)
                            <p class="text-lg leading-relaxed">{!! nl2br(e($paragraph)) !!}</p>
                        @endforeach
                    @else
                        <div class="space-y-6">
                            <p class="text-lg leading-relaxed">
                                Menurut cerita rakyat pada jaman dahulu ada sebuah desa bernama Desa Bayang Sari. Kepala Desa Bayang Sari konon katanya mempunyai Dua anak laki-laki yang sama sama ingin menjadi Kepala Desa (Kuwu), maka kedua saudara tersebut sepakat untuk membagi Desa menjadi dua yaitu Desa Pasirpanjang dan Desa Pabuaran.
                            </p>
                            <p class="text-lg leading-relaxed">
                                Desa Pasirpanjang berada di sebelah utara. Pasirpanjang adalah gabungan dari dua kata yaitu Pasir dan Panjang. Pasir yang berarti Pegunungan atau bukit, sedangkan kata panjang berarti memanjang. Dari penggabungan arti kata tersebut maka pasirpanjang adalah sebuah desa yang berada dibawah pegunungan/bukit yang memanjang dari arah barat ketimur yaitu pegunungan LIO dan Halimun.
                            </p>
                            <div class="bg-orange-100 dark:bg-gray-600 p-6 rounded-xl border border-orange-200 dark:border-gray-500">
                                <h3 class="text-xl font-semibold text-orange-800 dark:text-orange-200 mb-4">Fakta Menarik</h3>
                                <p class="text-lg leading-relaxed">
                                    Hal mistik di desa ini masih sangat kental, mashur dikalangan dunia supranatural dengan misteri Gunung Lio dan Gunung Halimun. Ada banyak punden sejarah di kedua gunung tersebut.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> 