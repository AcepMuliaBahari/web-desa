<div class="flex items-center">
    <a href="{{ route('desa') }}" class="flex items-center space-x-4 group ml-4">
        <!-- Logo Container -->
        <div class="relative w-12 h-12 overflow-hidden rounded-lg transform group-hover:scale-105 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-400 to-primary-600 dark:from-primary-500 dark:to-primary-700"></div>
            <div class="relative w-full h-full flex items-center justify-center">
                <img src="{{ asset('images/logo-b.png') }}" 
                     alt="Logo Desa Pasirpanjang" 
                     class="w-14 h-14 object-contain">
            </div>
        </div>

        <!-- Logo Text -->
        <div class="flex flex-col">
            <span class="text-base font-semibold text-gray-900 dark:text-white leading-tight group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors duration-200">
                Desa Pasirpanjang
            </span>
            <span class="text-[10px] text-gray-600 dark:text-gray-400 font-medium">
                Kec. Salem Kab. Brebes
            </span>
        </div>
    </a>
</div>