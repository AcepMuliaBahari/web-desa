<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> 
    <title>{{ isset($title) ? $title . ' -' : '' }} Admin Dashboard - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />   
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- Dark mode script -->
    <script>

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

    </script>
</head>
 
<body class="bg-gray-50 dark:bg-gray-900">
  <x-alert />
  <x-toast/>

    @include('layouts.admin.partials.navbar')
    @include('layouts.admin.partials.sidebar')
           
    <div class="p-4 sm:ml-64 transition-all duration-300">

        <div class="p-4 mt-14">
            @include('layouts.admin.partials.header')
            
         

            
            <!-- Main Content -->
            @yield('content')
        </div>
    </div>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
