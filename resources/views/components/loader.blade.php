<div id="preloader" class="fixed inset-0 flex items-center justify-center bg-white dark:bg-gray-900 z-50 transition-opacity duration-500">
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
    /* Animasi khusus */
    @keyframes fade-in-out {
        0%, 100% { opacity: 0.3; transform: translateY(2px); }
        50% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-out {
        animation: fade-in-out 2s ease-in-out infinite;
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