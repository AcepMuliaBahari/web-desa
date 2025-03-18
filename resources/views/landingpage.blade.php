<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'DESA PASIRPANJANG')</title>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-blue-600 border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold text-white whitespace-nowrap">DESA PASIRPANJANG</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if (Route::has('login')) 
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('admin/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Website Desa Pasirpanjang</h1>
            <p class="text-xl mb-8">Melayani Masyarakat dengan Sepenuh Hati</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 px-4">
        <!-- Web Pages Section -->
        <section id="web-pages" class="mb-12">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Informasi Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($webPages as $webPage)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-bold text-blue-700 mb-3">{{ $webPage->title }}</h3>
                    <p class="text-gray-600">{{ $webPage->description }}</p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- News Section -->
        <section id="news" class="mb-12">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Berita Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($news as $newsItem)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-bold text-blue-700 mb-3">{{ $newsItem->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $newsItem->excerpt }}</p>
                    <a href="/news/{{ $newsItem->id }}" class="text-blue-600 hover:text-blue-800 font-medium">Baca Selengkapnya →</a>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Events Section -->
        <section id="events" class="mb-12">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Agenda Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-bold text-blue-700 mb-3">{{ $event->name }}</h3>
                    <div class="text-gray-600">
                        <p class="mb-2"><span class="font-medium">Tanggal:</span> {{ $event->date }}</p>
                        <p><span class="font-medium">Lokasi:</span> {{ $event->location }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Resources Section -->
        <section id="resources" class="mb-12">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Potensi Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($resources as $resource)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-bold text-blue-700 mb-3">{{ $resource->type }}</h3>
                    <div class="text-gray-600">
                        <p class="mb-2"><span class="font-medium">Tahun:</span> {{ $resource->year }}</p>
                        <p><span class="font-medium">Nilai:</span> {{ $resource->value }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Tentang Desa</h3>
                    <p>Desa Pasirpanjang adalah desa yang terletak di Kecamatan XXX, Kabupaten XXX.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <p>Email: contact@desapasirpanjang.com</p>
                    <p>Telp: (021) XXXX-XXXX</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Jam Operasional</h3>
                    <p>Senin - Jumat: 08.00 - 16.00</p>
                    <p>Sabtu: 08.00 - 12.00</p>
                </div>
            </div>
            <div class="text-center mt-8 pt-8 border-t border-blue-500">
                <p>&copy; {{ date('Y') }} Desa Pasirpanjang. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
