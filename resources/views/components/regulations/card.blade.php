@props(['title', 'icon', 'description', 'color' => 'amber'])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
    <div class="p-6">
        <div class="w-12 h-12 rounded-lg bg-{{ $color }}-100 dark:bg-{{ $color }}-900 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            <i class="fas fa-{{ $icon }} text-xl text-{{ $color }}-600 dark:text-{{ $color }}-400"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
        <p class="text-gray-600 dark:text-gray-400">{{ $description }}</p>
        <div class="mt-4">
            <a href="#" class="inline-flex items-center text-{{ $color }}-600 hover:text-{{ $color }}-700 dark:text-{{ $color }}-400 dark:hover:text-{{ $color }}-300">
                Lihat Detail
                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
        </div>
    </div>
</div>