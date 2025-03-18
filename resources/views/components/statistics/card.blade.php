@props(['title', 'icon', 'color' => 'blue'])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
    <div class="p-1 {{ "bg-$color-500" }}"></div>
    <div class="p-6">
        <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-lg {{ "bg-$color-100 dark:bg-$color-900/30" }} flex items-center justify-center mr-4">
                <i class="fas fa-{{ $icon }} text-xl {{ "text-$color-600 dark:text-$color-400" }}"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $title }}</h3>
        </div>
        <div class="space-y-4">
            {{ $slot }}
        </div>
    </div>
</div>