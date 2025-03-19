@props(['title', 'icon', 'color' => 'blue'])

<div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-2 relative">
    <!-- Gradient top bar -->
    <div class="h-1.5 w-full bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-600"></div>
    
    <div class="p-6">
        <div class="flex items-start mb-5">
            <!-- Animated icon container -->
            <div class="w-14 h-14 rounded-2xl bg-{{ $color }}-100 dark:bg-{{ $color }}-900/30 flex items-center justify-center mr-4 transition-all duration-300 group-hover:bg-{{ $color }}-200 group-hover:scale-105">
                <i class="fas fa-{{ $icon }} text-2xl text-{{ $color }}-600 dark:text-{{ $color }}-400 transition-all duration-300 group-hover:scale-110"></i>
            </div>
            
            <!-- Title with accent -->
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-1 transition-colors duration-300 group-hover:text-{{ $color }}-600 dark:group-hover:text-{{ $color }}-400">
                    {{ $title }}
                </h3>
                <div class="w-8 h-1 bg-{{ $color }}-500 rounded-full"></div>
            </div>
        </div>
        
        <!-- Content with better typography -->
        <div class="space-y-3 text-gray-600 dark:text-gray-300 leading-relaxed">
            {{ $slot }}
        </div>
    </div>
    
    <!-- Hover effect background -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-10 transition-opacity duration-300 bg-{{ $color }}-500"></div>
</div>