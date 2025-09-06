<div id="preloader" class="fixed inset-0 flex items-center justify-center z-50 transition-opacity duration-500 loader-background">
    <div class="flex flex-col items-center space-y-6">
        <!-- Logo Desa dengan Animasi -->
        <div class="relative w-32 h-32 animate-bounce">
            <img 
                src="{{ asset('images/logo-b.png') }}" 
                alt="Logo Desa Pasirpanjang" 
                class="w-full h-full object-contain transform transition-transform duration-300 hover:scale-105"
            >
            <div class="absolute inset-0 border-4 border-green-100 rounded-full animate-ping opacity-75"></div>
        </div>



        <!-- Text dengan Animasi -->
        <div class="text-center space-y-2">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white animate-pulse">
                Desa Pasirpanjang
            </h3>

        </div>

        <!-- Progress Bar -->
        <div class="w-48 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
            <div class="bg-green-600 h-1.5 rounded-full animate-progress"></div>
        </div>
    </div>
</div>

<style>
    .loader-background {
        background: linear-gradient(45deg, #f3f4f6, #e5e7eb, #d1d5db);
        background-size: 200% 200%;
        animation: loader-gradient 8s ease infinite;
    }

    .dark .loader-background {
        background: linear-gradient(45deg, #1f2937, #374151, #4b5563);
        background-size: 200% 200%;
        animation: loader-gradient 8s ease infinite;
    }

    @keyframes loader-gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    /* Animasi khusus */
    @keyframes fade-in-out {
        0%, 100% { opacity: 0.3; transform: translateY(2px); }
        50% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-out {
        animation: fade-in-out 3s ease-in-out infinite;
    }
    .delay-300 {
        animation-delay: 300ms;
    }
</style>



<script>
    // Untuk menghilangkan preloader setelah halaman selesai dimuat
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        setTimeout(() => {
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        }, 1000);
    });
</script>