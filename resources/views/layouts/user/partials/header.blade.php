<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
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
                            if($segment === 'user') continue;
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
                                'user.dashboard' => 'Dashboard',
                                'public-services.index' => 'Layanan Publik',
                                'complaints.index' => 'Pengaduan',
                                'letters.index' => 'Surat',
                                'news.index' => 'Berita',
                                'events.index' => 'Event',
                                'umkm.index' => 'UMKM',
                                'potentials.index' => 'Potensi Desa',
                                'profile.edit' => 'Profil',
                                default => 'Dashboard'
                            };
                        @endphp
                        {{ $title }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @switch($route)
                            @case('user.dashboard')
                                Ringkasan dan fitur untuk pengguna
                                @break
                            @case('public-services.index')
                                Akses layanan publik desa
                                @break
                            @case('complaints.index')
                                Kelola pengaduan Anda
                                @break
                            @case('letters.index')
                                Kelola surat Anda
                                @break
                            @case('news.index')
                                Berita terbaru desa
                                @break
                            @case('events.index')
                                Event dan kegiatan desa
                                @break
                            @case('umkm.index')
                                UMKM di desa
                                @break
                            @case('potentials.index')
                                Potensi desa
                                @break
                            @case('profile.edit')
                                Kelola profil Anda
                                @break
                            @default
                                Desa Pasirpanjang
                        @endswitch
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
