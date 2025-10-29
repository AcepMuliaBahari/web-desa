<div class="flex items-center space-x-6">
    <ul class="hidden md:flex items-center space-x-8 text-gray-700 dark:text-gray-300">
        <!-- Link Beranda -->
        @if(request()->routeIs('desa'))
        <li>
            <a href="{{ route('desa') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
                      {{ request()->routeIs('desa') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
                <i class="fas fa-home mr-2"></i>
                 Beranda
            </a>
        </li>
        @endif
         @if(!request()->routeIs('desa'))
             @include('components.navbar.logo')
         @endif
        <!-- Link Profil dengan Dropdown -->
        <li class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="setTimeout(() => open = false, 1000)">
            <a href="{{ route('profile') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
                      {{ request()->routeIs('profile') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
                <i class="fas fa-user-circle mr-2"></i>
                Profil Desa
                <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="absolute left-0 mt-1 bg-white dark:bg-gray-800 rounded-xl shadow-lg w-56
                        border border-gray-100 dark:border-gray-700">
                <div class="py-1">
                    <a href="{{ route('profile') }}#visi-misi"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-bullseye w-5 mr-3 text-primary-500"></i>
                        <span>Visi & Misi</span>
                    </a>
                    <a href="{{ route('profile') }}#sejarah"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-history w-5 mr-3 text-primary-500"></i>
                        <span>Sejarah Desa</span>
                    </a>
                    <a href="{{ route('profile') }}#lokasi"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-map-marker-alt w-5 mr-3 text-primary-500"></i>
                        <span>Lokasi</span>
                    </a>
                </div>
            </div>
        </li>

        <!-- Link Potensi Desa dengan Dropdown -->
        <li class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="setTimeout(() => open = false, 1000)">
            <a href="{{ route('potentials.index') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
                      {{ request()->routeIs('potentials.index') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
                <i class="fas fa-chart-line mr-2"></i>
                Potensi Desa
                <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="absolute left-0 mt-1 bg-white dark:bg-gray-800 rounded-xl shadow-lg w-56
                        border border-gray-100 dark:border-gray-700">
                <div class="py-1">
                    <a href="{{ route('potentials.index') }}#lapak"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-store w-5 mr-3 text-primary-500"></i>
                        <span>Lapak UMKM</span>
                    </a>
                    <a href="{{ route('potentials.index') }}#galeri"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-images w-5 mr-3 text-primary-500"></i>
                        <span>Galeri</span>
                    </a>
                    <a href="{{ route('potentials.index') }}#pembangunan"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-building w-5 mr-3 text-primary-500"></i>
                        <span>Pembangunan</span>
                    </a>
                    <!-- <a href="{{ route('potentials.index') }}#pengaduan"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-comment-alt w-5 mr-3 text-primary-500"></i>
                        <span>Pengaduan</span>
                    </a> -->
                </div>
            </div>
        </li>

        <!-- Link Data Statistik dengan Dropdown -->
        <li class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="setTimeout(() => open = false, 1000)">
            <a href="{{ route('statistics.index') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
                      {{ request()->routeIs('statistics.index') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
                <i class="fas fa-chart-bar mr-2"></i>
                Data Statistik
                <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="absolute left-0 mt-1 bg-white dark:bg-gray-800 rounded-xl shadow-lg w-56
                        border border-gray-100 dark:border-gray-700">
                <div class="py-2">
                    <a href="{{ route('statistics.index') }}#data-penduduk"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-users w-5 mr-3 text-primary-500"></i>
                        <span>Data Penduduk</span>
                    </a>
                    <a href="{{ route('statistics.index') }}#apbdes"
                       class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-money-bill-wave w-5 mr-3 text-primary-500"></i>
                        <span>APBDes</span>
                    </a>
                    <a href="{{ route('statistics.index') }}#status-idm"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                     <i class="fas fa-chart-pie mr-2"></i>
                     Status IDM
                 </a>
                 <a href="{{ route('statistics.index') }}#status-sdgm"
                 class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                  <i class="fas fa-globe mr-2"></i>
                  Status SDGs
              </a>
                </div>
            </div>
        </li>

    <!-- Link Regulasi Desa dengan Dropdown -->
<li class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="setTimeout(() => open = false, 3000)">
    <a href="{{ route('regulations.index') }}"
       class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
              {{ request()->routeIs('regulations.index') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
        <i class="fas fa-gavel mr-2"></i>
        Regulasi Desa
        <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </a>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="absolute left-0 mt-1 bg-white dark:bg-gray-800 rounded-xl shadow-lg w-56
                border border-gray-100 dark:border-gray-700">
        <div class="py-1">
            <!-- Produk Hukum -->
            <a href="{{ route('regulations.index') }}#produk-hukum"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-balance-scale w-5 mr-3 text-primary-500"></i>
                <span>Produk Hukum</span>
            </a>
            <!-- Sub-menu Produk Hukum -->
            {{-- <div class="pl-12 py-1 border-l-2 border-primary-100 dark:border-primary-800">
                <a href="{{ route('regulations.index') }}#perdes"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Perdes</span>
                </a>
                <a href="{{ route('regulations.index') }}#perkades"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Perkades</span>
                </a>
                <a href="{{ route('regulations.index') }}#sk-kades"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>SK Kades</span>
                </a>
            </div> --}}

            <!-- Informasi Publik -->
            <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
            <a href="{{ route('regulations.index') }}#informasi-publik"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-info-circle w-5 mr-3 text-primary-500"></i>
                <span>Informasi Publik</span>
            </a>
            <!-- Sub-menu Informasi Publik -->
            {{-- <div class="pl-12 py-1 border-l-2 border-primary-100 dark:border-primary-800">
                <a href="{{ route('regulations.index') }}#berkala"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Berkala</span>
                </a>
                <a href="{{ route('regulations.index') }}#serta-merta"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Serta Merta</span>
                </a>
                <a href="{{ route('regulations.index') }}#setiap-saat"
                   class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    <span>Setiap Saat</span>
                </a>
            </div> --}}
        </div>
    </div>
</li>



<!-- PPID -->
<li class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="setTimeout(() => open = false, 3000)">
    <a href="{{ route('ppid.index') }}"
       class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
              {{ request()->routeIs('ppid.index') ? 'text-primary-600 dark:text-primary-400 font-medium' : '' }}">
        <i class="fas fa-info-circle mr-2"></i>
        PPID
        <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </a>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="absolute left-0 mt-1 bg-white dark:bg-gray-800 rounded-xl shadow-lg w-56
                border border-gray-100 dark:border-gray-700">
        <div class="py-2">
            <a href="{{ route('ppid.index') }}#profil"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-user-tie w-5 mr-3 text-primary-500"></i>
                <span>Apa Itu PPID ?</span>
            </a>
            <a href="{{ route('ppid.index') }}#dasar-hukum"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-gavel w-5 mr-3 text-primary-500"></i>
                <span>Dasar Hukum</span>
            </a>
            <a href="{{ route('ppid.index') }}#tugas"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-tasks w-5 mr-3 text-primary-500"></i>
                <span>Tugas dan Wewenang</span>
            </a>
            <a href="{{ route('ppid.index') }}#jenis-informasi"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-list w-5 mr-3 text-primary-500"></i>
                <span>Jenis Informasi</span>
            </a>
            <a href="{{ route('ppid.index') }}#prosedur"
               class="flex items-center px-4 py-2.5 hover:bg-gray-50 dark:hover:bg-gray-700">
                <i class="fas fa-file-alt w-5 mr-3 text-primary-500"></i>
                <span>Prosedur Permohonan</span>
            </a>
        </div>
    </div>
</li>

<!-- Pengaduan -->
<li class="relative group">
    <a href="{{ route('pengaduan.index') }}"
       class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200
              {{ request()->routeIs('pengaduan.index') ? 'text-primary-600 dark:text-primary-400 font-medium' : 'text-gray-700 dark:text-gray-300' }}">
        <i class="fas fa-comments mr-2"></i>
        <span>Pengaduan</span>
        <svg class="w-4 h-4 ml-2 text-gray-400 dark:text-gray-500"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H7l-4 4V10a2 2 0 012-2h2" />
        </svg>
    </a>
</li>

                                <!-- Auth Buttons -->
                                 <li>
                                <div class="hidden md:flex items-center space-x-4 text-gray-700 dark:text-gray-300">
                            @if (Route::has('login'))
                                @auth
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ url('/admin/dashboard') }}"
                                           class="flex items-center px-4 py-2 rounded-lg bg-primary-50 text-primary-600 ring-1 ring-primary-500/10
                                                  hover:bg-primary-100 dark:bg-primary-400/10 dark:text-primary-400 dark:ring-primary-400/20
                                                  dark:hover:bg-primary-400/20 transition-all duration-200">
                                            <i class="fas fa-tachometer-alt mr-2"></i>
                                            Dashboard Admin
                                        </a>
                                    @else
                                        <a href="{{ route('user.dashboard') }}"
                                           class="flex items-center px-4 py-2 rounded-lg bg-primary-50 text-primary-600 ring-1 ring-primary-500/10
                                                  hover:bg-primary-100 dark:bg-primary-400/10 dark:text-primary-400 dark:ring-primary-400/20
                                                  dark:hover:bg-primary-400/20 transition-all duration-200">
                                            <i class="fas fa-tachometer-alt mr-2"></i>
                                            Dashboard
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="flex items-center px-4 py-2 rounded-lg bg-primary-600 text-gray-700 dark:text-gray-300 hover:text-indigo-600
                                              dark:bg-primary-500 dark:hover:bg-primary-600 transition-all duration-200">
                                        <i class="fas fa-sign-in-alt mr-2"></i>
                                        Login
                                    </a>
                                @endauth
                            @endif
                        </div>
                        </li>

                        <li>

                                <!-- Dark Mode Toggle -->
                                <button id="dark-mode-toggle"
                                        class="hidden md:flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100
                                            dark:hover:bg-gray-700 transition-all duration-200">
                                    <svg id="moon-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                    <svg id="sun-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </button>
                        </li>



    </ul>




</div>
