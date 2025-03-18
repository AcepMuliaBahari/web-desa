<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title> 
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div>
                    <a href="{{ url('/') }}" class="text-xl font-bold">{{ config('app.name') }}</a>
                </div>
                <div>
                    <a href="{{ route('public-services.index') }}" class="text-gray-700 hover:text-gray-900">Layanan Publik</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white mt-8 py-4">
        <div class="container mx-auto px-4 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
    @include('components.scripts.animation')
</body>
</html> 