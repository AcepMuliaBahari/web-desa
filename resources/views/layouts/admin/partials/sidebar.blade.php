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
                    <a href="{{ route('admin.dashboard') }}" 
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                {{-- Pengaduan --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.complaints.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-pengaduan" 
                        data-collapse-toggle="dropdown-pengaduan">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.complaints.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pengaduan</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.complaints.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pengaduan" class="{{ request()->routeIs('admin.complaints.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.complaints.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.complaints.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Pengaduan
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Data Penduduk --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.citizens.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-penduduk" 
                        data-collapse-toggle="dropdown-penduduk">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.citizens.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Penduduk</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.citizens.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-penduduk" class="{{ request()->routeIs('admin.citizens.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.citizens.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.citizens.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Penduduk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.citizens.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.citizens.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Penduduk
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Surat Menyurat --}}


                {{-- Regulasi --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.regulations.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-regulasi" 
                        data-collapse-toggle="dropdown-regulasi">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.regulations.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Regulasi</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.regulations.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-regulasi" class="{{ request()->routeIs('admin.regulations.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.regulations.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.regulations.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Regulasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.regulations.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.regulations.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Regulasi
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Keuangan --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.finances.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-keuangan" 
                        data-collapse-toggle="dropdown-keuangan">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.finances.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Keuangan</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.finances.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-keuangan" class="{{ request()->routeIs('admin.finances.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.finances.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.finances.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Laporan Keuangan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.finances.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.finances.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Laporan
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Berita --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.news.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-berita" 
                        data-collapse-toggle="dropdown-berita">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.news.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Berita</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.news.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-berita" class="{{ request()->routeIs('admin.news.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.news.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.news.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Berita
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.news.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Berita
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Profil Desa --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.village-profile.*') || request()->routeIs('admin.village-officials.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-profil" 
                        data-collapse-toggle="dropdown-profil">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.village-profile.*') || request()->routeIs('admin.village-officials.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Profil Desa</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.village-profile.*') || request()->routeIs('admin.village-officials.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-profil" class="{{ request()->routeIs('admin.village-profile.*') || request()->routeIs('admin.village-officials.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.village-profile.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.village-profile.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Profil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.village-officials.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.village-officials.*') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Pejabat Desa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.village-profile.structure') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.village-profile.structure') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Struktur Organisasi
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Arsip --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.archives.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-arsip" 
                        data-collapse-toggle="dropdown-arsip">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.archives.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Arsip</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.archives.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-arsip" class="{{ request()->routeIs('admin.archives.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.archives.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.archives.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Arsip
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.archives.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.archives.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Arsip
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Layanan Publik --}}

                {{-- Organisasi --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.organizations.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-organisasi" 
                        data-collapse-toggle="dropdown-organisasi">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.organizations.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Organisasi</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.organizations.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-organisasi" class="{{ request()->routeIs('admin.organizations.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.organizations.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.organizations.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Organisasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.organizations.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.organizations.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Organisasi
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Event/Kegiatan --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.events.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-event" 
                        data-collapse-toggle="dropdown-event">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('admin.events.*') ? 'text-blue-600 dark:text-blue-400' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Event</span>
                        <svg class="w-3 h-3 {{ request()->routeIs('admin.events.*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-event" class="{{ request()->routeIs('admin.events.*') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('admin.events.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.events.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Event
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.events.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.events.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Event
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Potensi Desa --}}
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.*') || request()->routeIs('admin.developments.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-potensi" 
                        data-collapse-toggle="dropdown-potensi">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Potensi Desa</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-potensi" class="hidden py-2 space-y-2">
                        {{-- UMKM --}}
                        <li>
                            <a href="{{ route('admin.umkm.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar UMKM
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.umkm.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah UMKM
                            </a>
                        </li>

                        {{-- Pembangunan --}}
                        <li>
                            <a href="{{ route('admin.developments.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.developments.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Pembangunan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.developments.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.developments.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Pembangunan
                            </a>
                        </li>

                        {{-- Galeri --}}
                        <li>
                            <a href="{{ route('admin.galleries.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.galleries.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Daftar Galeri
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.galleries.create') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.galleries.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Tambah Galeri
                            </a>
                        </li>
                    </ul>
                </li>


                
                <li>
                    <button type="button" 
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.statistics.*') || request()->routeIs('admin.statistics.*') ? 'bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-600' : '' }}" 
                        aria-controls="dropdown-statistik" 
                        data-collapse-toggle="dropdown-statistik">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Statistik</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" {{ request()->routeIs('admin.statistics.index') }} fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-statistik" class="hidden py-2 space-y-2">
                        {{-- UMKM --}}
                        <li>
                            <a href="{{ route('admin.statistics.index') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Statistik
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.statistics.penduduk') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Data Penduduk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.statistics.apbdes') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.umkm.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                APBDES
                            </a>
                        </li>

                        {{-- Pembangunan --}}
                        <li>
                            <a href="{{ route('admin.statistics.idm') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.developments.index') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Status IBM
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.statistics.sdgs') }}" 
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('admin.developments.create') ? 'bg-blue-50 dark:bg-blue-800' : '' }}">
                                Status SDGs
                            </a>
                        </li>


                    </ul>
                </li>


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

     // Toggle Dropdowns
     const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');
     
     dropdownButtons.forEach(button => {
         button.addEventListener('click', () => {
             const targetId = button.getAttribute('data-collapse-toggle');
             const targetElement = document.getElementById(targetId);
             
             targetElement.classList.toggle('hidden');
             
             // Rotate arrow icon
             const arrow = button.querySelector('svg:last-child');
             arrow.style.transform = targetElement.classList.contains('hidden') ? '' : 'rotate(180deg)';
         });
     });
 });
 </script>