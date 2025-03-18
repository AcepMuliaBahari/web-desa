<nav class="px-4 py-6 space-y-6">
    <a href="{{ route('desa') }}" class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600">
        Home
    </a>
    
    {{-- Dropdown Profil --}}
    <div>
        <button onclick="toggleDropdown('profil-dropdown')" class="flex items-center justify-between w-full text-gray-700 dark:text-gray-300">
            Profil Desa
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="profil-dropdown" class="hidden pl-4 mt-2 space-y-2">
            <a href="{{ route('profile') }}#visi-misi" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Visi</a>
            <a href="{{ route('profile') }}#visi-misi" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Misi</a>
            
            <a href="{{ route('profile') }}#sejarah" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Sejarah Desa</a>
            <a href="{{ route('profile') }}#lokasi" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Peta Lokasi</a>
        </div>
    </div>
 
    {{-- Dropdown Potensi --}}
    <div>
        <button onclick="toggleDropdown('potensi-dropdown')" class="flex items-center justify-between w-full text-gray-700 dark:text-gray-300">
            Potensi Desa
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="potensi-dropdown" class="hidden pl-4 mt-2 space-y-2">
            <a href="{{ route('potentials.index') }}#lapak" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Lapak</a>
            <a href="{{ route('potentials.index') }}#galeri" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Galeri</a>
            <a href="{{ route('potentials.index') }}#pembangunan" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Pembangunan</a>
            <a href="{{ route('potentials.index') }}#pengaduan" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Pengaduan</a>
        </div>
    </div>

    {{-- Dropdown Statistik --}}
    <div>
        <button onclick="toggleDropdown('statistik-dropdown')" class="flex items-center justify-between w-full text-gray-700 dark:text-gray-300">
            Data Statistik
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="statistik-dropdown" class="hidden pl-4 mt-2 space-y-2">
            <a href="#data-penduduk" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">Data Penduduk</a>
            <a href="#apbdes" class="block text-gray-600 dark:text-gray-400 hover:text-indigo-600">APBDes</a>
        </div>
    </div>

    <a href="#status-idm" class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600">
        Status IDM
    </a>
    
    <a href="#status-sdga" class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600">
        Status SDGs
    </a>



    <!-- Border line -->
    <div class="border-t border-gray-200 dark:border-gray-700"></div>

    <!-- Auth Links Mobile -->
    <div class="pt-4">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left text-gray-700 dark:text-gray-300 hover:text-indigo-600">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600">
                Login
            </a>
            <a href="{{ route('register') }}" class="block mt-2 text-gray-700 dark:text-gray-300 hover:text-indigo-600">
                Register
            </a>
        @endauth
    </div>
 
</nav> 