<div class="sm:ml-64">
    <aside id="logo-sidebar" class="fixed top-0 left- z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <button id="toggleSidebarButton" class="fixed left-64 top-4 p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 ease-in-out transform sm:translate-x-0 -translate-x-full">
                <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <ul class="space-y-2 font-medium">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('user.dashboard') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('user.dashboard') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                {{-- Layanan Publik --}}
                <!-- <li>
                    <a href="{{ route('public-services.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('public-services.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('public-services.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"></path>
                        </svg>
                        <span class="ms-3">Layanan Publik</span>
                    </a>
                </li> -->

                {{-- Pengaduan --}}
                <li>
                    <a href="{{ route('complaints.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('complaints.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('complaints.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path>
                        </svg>
                        <span class="ms-3">Pengaduan</span>
                    </a>
                </li>

                <!-- {{-- Surat --}}
                <li>
                    <a href="{{ route('letters.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('letters.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('letters.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <span class="ms-3">Surat</span>
                    </a>
                </li>

                {{-- Berita --}}
                <li>
                    <a href="{{ route('news.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('news.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('news.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        <span class="ms-3">Berita</span>
                    </a>
                </li>

                {{-- Event --}}
                <li>
                    <a href="{{ route('events.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('events.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('events.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0V3H7V2a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                        </svg>
                        <span class="ms-3">Event</span>
                    </a>
                </li>

                {{-- UMKM --}}
                <li>
                    <a href="{{ route('umkm.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('umkm.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('umkm.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="ms-3">UMKM</span>
                    </a>
                </li>

                {{-- Potensi --}}
                <li>
                    <a href="{{ route('potentials.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('potentials.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('potentials.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"></path>
                        </svg>
                        <span class="ms-3">Potensi Desa</span>
                    </a>
                </li>

                {{-- Profil --}}
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('profile.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('profile.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                        </svg>
                        <span class="ms-3">Profil</span>
                    </a>
                </li> -->

            </ul>
        </div>
    </aside>
</div>

{{-- Script untuk Toggle Sidebar --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleSidebarButton');
    const sidebar = document.getElementById('logo-sidebar');
    const mainContent = document.querySelector('.sm\\:ml-64');
    let isSidebarOpen = true;

    // Fungsi untuk toggle sidebar
    function toggleSidebar() {
        isSidebarOpen = !isSidebarOpen;

        // Toggle sidebar
        if (isSidebarOpen) {
            sidebar.classList.remove('-translate-x-full');
            mainContent.style.marginLeft = '16rem';
        } else {
            sidebar.classList.add('-translate-x-full');
            mainContent.style.marginLeft = '0';
        }

        // Rotate button icon
        toggleButton.querySelector('svg').style.transform = isSidebarOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    // Event listener untuk tombol toggle
    toggleButton.addEventListener('click', toggleSidebar);

    // Inisialisasi state awal untuk desktop
    if (window.innerWidth >= 640) { // sm breakpoint
        sidebar.classList.remove('-translate-x-full');
    }

    // Handle responsive behavior
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 640) {
            if (isSidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                mainContent.style.marginLeft = '16rem';
            }
        } else {
            sidebar.classList.add('-translate-x-full');
            mainContent.style.marginLeft = '0';
        }
    });
});
</script>
