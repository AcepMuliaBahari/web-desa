<section id="lokasi" class="mb-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Lokasi Desa</h2>
        
        <!-- Info Lokasi -->
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div class="animate-fade-right">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Batas Wilayah</h3>
                <div class="grid grid-cols-2 gap-4 text-gray-600 dark:text-gray-300">
                    <div>
                        <p class="font-medium">Utara</p>
                        <p>Kecamatan Banjarharjo dan Ketanggungan, Pegunungan Lio Kumbang</p>
                    </div>
                    <div>
                        <p class="font-medium">Selatan</p>
                        <p>Perbukitan Baribis Kutabima</p>
                    </div>
                    <div>
                        <p class="font-medium">Timur</p>
                        <p>Sungai Cigunung</p>
                    </div>
                    <div>
                        <p class="font-medium">Barat</p>
                        <p>Sungai Cibinong</p>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Luas Wilayah</h3>
                    <div class="space-y-2 text-gray-600 dark:text-gray-300">
                        <p>• Tanah sawah: 2.642 Ha (17%)</p>
                        <p>• Tanah kering: 4.286 Ha (28%)</p>
                        <p>• Hutan negara: 8.474 Ha (55%)</p>
                    </div>
                </div>
            </div>
            
            <div class="animate-fade-left">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Alamat Kantor Desa</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    {{ $profile->address ?? 'Jl. Situ No. 1 Desa Pasirpanjang Kecamatan Salem. Pos 52275' }}
                </p>
                <div class="flex gap-4">
                    <a href="https://maps.google.com/?q={{ urlencode($profile->address ?? 'Desa Pasirpanjang, Salem, Brebes') }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>

        <!-- Peta -->
        <div class="h-[400px] rounded-lg overflow-hidden shadow-lg animate-fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31671.80368059185!2d108.79706350000001!3d-
7.128835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2
!1s0x2e6f76073f815187%3A0x5027a76e3566da0!2sPasir%20Panja
ng%2C%20Kec.%20Salem%2C%20Kabupaten%20Brebes%2C%20Jawa%20T
engah!5e0!3m2!1sid!2sid!4v1736978919741!5m2!1sid!2sid"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full">
            </iframe>
        </div>
    </div>
</section> 