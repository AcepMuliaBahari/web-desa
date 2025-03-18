<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    
                    @php
                        $segments = request()->segments();
                        $currentPath = '';
                    @endphp

                    @foreach($segments as $segment)
                        @php
                            $currentPath .= '/'.$segment;
                            $readableSegment = ucwords(str_replace(['-', '_'], ' ', $segment));
                            if($segment === 'admin') continue;
                        @endphp
                        
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                @if($loop->last)
                                    <span class="text-gray-400 ml-1 md:ml-2 dark:text-gray-500" aria-current="page">{{ $readableSegment }}</span>
                                @else
                                    <a href="{{ $currentPath }}" class="ml-1 md:ml-2 text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">{{ $readableSegment }}</a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </nav>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        @php
                            $route = request()->route()->getName();
                            $title = match($route) {
                                'admin.dashboard' => 'Dashboard',
                                'admin.citizens.index' => 'Data Penduduk',
                                'admin.citizens.create' => 'Tambah Penduduk',
                                'admin.citizens.edit' => 'Edit Penduduk',
                                'admin.citizens.show' => 'Detail Penduduk',
                                'admin.letters.index' => 'Daftar Surat',
                                'admin.letters.create' => 'Buat Surat Baru',
                                'admin.letters.edit' => 'Edit Surat',
                                'admin.letters.show' => 'Detail Surat',
                                'admin.regulations.index' => 'Regulasi Desa',
                                'admin.regulations.create' => 'Tambah Regulasi',
                                'admin.regulations.edit' => 'Edit Regulasi',
                                'admin.regulations.show' => 'Detail Regulasi',
                                'admin.finances.index' => 'Laporan Keuangan',
                                'admin.finances.create' => 'Tambah Laporan',
                                'admin.finances.edit' => 'Edit Laporan',
                                'admin.finances.show' => 'Detail Laporan',
                                'admin.galleries.index' => 'Galeri',
                                'admin.galleries.create' => 'Tambah Galeri',
                                'admin.galleries.edit' => 'Edit Galeri',
                                'admin.galleries.show' => 'Detail Galeri',
                                default => ucwords(str_replace(['.', '-', '_'], ' ', end($segments)))
                            };
                        @endphp
                        {{ $title }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @switch($route)
                            @case('admin.dashboard')
                                Ringkasan dan statistik sistem
                                @break
                            @case('admin.citizens.index')
                                Kelola data penduduk desa
                                @break
                            @case('admin.letters.index')
                                Kelola surat menyurat desa
                                @break
                            @case('admin.regulations.index')
                                Kelola regulasi dan peraturan desa
                                @break
                            @case('admin.finances.index')
                                Kelola laporan keuangan desa
                                @break
                            @case('admin.galleries.index')
                                Kelola galeri foto dan video desa
                                @break
                            @default
                                Desa Pasirpanjang
                        @endswitch
                    </p>
                </div>

                <div class="flex mt-4 sm:mt-0">
                    @switch($route)

                        @case('admin.letters.index')
                            <a href="{{ route('admin.letters.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-lime-400 rounded-lg hover:bg-lime-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Buat Surat
                            </a>
                            @break
                        @case('admin.regulations.index')
                            <a href="{{ route('admin.regulations.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-lime-400 rounded-lg hover:bg-lime-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Regulasi
                            </a>
                            @break
                        {{-- @case('admin.finances.index')
                            <a href="{{ route('admin.finances.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Laporan
                            </a>
                            @break --}}
                        @case('admin.galleries.index')
                            <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-lime-400 rounded-lg hover:bg-lime-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Galeri
                            </a>
                            @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div> 