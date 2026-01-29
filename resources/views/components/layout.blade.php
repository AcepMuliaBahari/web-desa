<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
     <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> 
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'DESA PASIRPANJANG')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- Styles -->
    @include('components.styles.animations') 
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200">
    <div class="min-h-screen flex flex-col">
        <!-- Upbar Section - Only show on homepage -->
        @if(request()->routeIs('desa'))
            <div class="relative">
                @include('components.navbar.upbar')
            </div>
        @endif

        <!-- Navbar Section -->
        <div class="sticky top-0 z-50">
            @include('components.navbar.main')
        </div>

        <!-- Main Content -->
        <div class="flex-grow">
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Preloader -->
  


        <!-- Footer -->
        @include('components.footer')


    </div>

    <!-- Scripts and Mobile Menu -->
    @include('components.mobile-menu')
    @include('components.scripts.dark-mode')
    @include('components.scripts.animation')
    @include('components.scripts.mobile-menu')

    <!--Start of Tawk.to Script-->
        <!--Start of Tawk.to Script-->
        <!-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/67d58550abeddd190b965f52/1imd11h9r';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script> -->

        <!--End of Tawk.to Script-->
        <!-- <script>
    window.addEventListener("load", function () {
        setTimeout(() => {
            document.getElementById("preloader").classList.add("opacity-0");
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
            }, 300);
        },300);
    });
</script> -->

</body>
</html> 