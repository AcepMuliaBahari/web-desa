<nav class="mt-5 px-2 space-y-1">
    <!-- Dashboard -->
    <div x-data="{ open: true }" class="space-y-2">
        <button @click="open = !open" class="w-full flex items-center justify-between text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-home w-5 h-5"></i>
                <span>Dashboard</span>
            </div>
            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" class="pl-8 space-y-2">
            <a href="{{ route('user.dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.dashboard') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-tachometer-alt mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.dashboard') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Dashboard Utama
            </a>
        </div>
    </div>

    <!-- Profil -->
    <div x-data="{ open: false }" class="space-y-2">
        <button @click="open = !open" class="w-full flex items-center justify-between text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-user w-5 h-5"></i>
                <span>Profil</span>
            </div>
            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" class="pl-8 space-y-2" style="display: none;">
            <a href="{{ route('user.profile') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.profile') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-id-card mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.profile') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Data Pribadi
            </a>
            <a href="{{ route('user.profile.edit') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.profile.edit') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-edit mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.profile.edit') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Edit Profil
            </a>
        </div>
    </div>

    <!-- Layanan Surat -->
    <div x-data="{ open: false }" class="space-y-2">
        <button @click="open = !open" class="w-full flex items-center justify-between text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-envelope w-5 h-5"></i>
                <span>Layanan Surat</span>
            </div>
            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" class="pl-8 space-y-2" style="display: none;">
            <a href="{{ route('user.letters.create') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.letters.create') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-plus-circle mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.letters.create') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Buat Permohonan
            </a>
            <a href="{{ route('user.letters.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.letters.index') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-list mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.letters.index') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Riwayat Permohonan
            </a>
        </div>
    </div>

    <!-- Pengaduan -->
    <div x-data="{ open: false }" class="space-y-2">
        <button @click="open = !open" class="w-full flex items-center justify-between text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-bullhorn w-5 h-5"></i>
                <span>Pengaduan</span>
            </div>
            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" class="pl-8 space-y-2" style="display: none;">
            <a href="{{ route('user.complaints.create') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.complaints.create') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-plus-circle mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.complaints.create') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Buat Pengaduan
            </a>
            <a href="{{ route('user.complaints.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.complaints.index') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-list mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.complaints.index') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Riwayat Pengaduan
            </a>
        </div>
    </div>

    <!-- Informasi Desa -->
    <div x-data="{ open: false }" class="space-y-2">
        <button @click="open = !open" class="w-full flex items-center justify-between text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-info-circle w-5 h-5"></i>
                <span>Informasi Desa</span>
            </div>
            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" class="pl-8 space-y-2" style="display: none;">
            <a href="{{ route('user.village.news') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.village.news') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-newspaper mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.village.news') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Berita Desa
            </a>
            <a href="{{ route('user.village.events') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.village.events') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-calendar-alt mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.village.events') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Agenda Desa
            </a>
            <a href="{{ route('user.village.statistics') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('user.village.statistics') ? 'bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700' }}">
                <i class="fas fa-chart-bar mr-3 text-gray-500 group-hover:text-gray-500 {{ request()->routeIs('user.village.statistics') ? 'text-blue-500 dark:text-blue-400' : '' }}"></i>
                Data Statistik
            </a>
        </div>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="w-full flex items-center px-2 py-2 text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-900 rounded-md dark:text-red-400 dark:hover:bg-red-900/20 dark:hover:text-red-300">
            <i class="fas fa-sign-out-alt mr-3 w-5 h-5"></i>
            <span>Keluar</span>
        </button>
    </form>
</nav> 