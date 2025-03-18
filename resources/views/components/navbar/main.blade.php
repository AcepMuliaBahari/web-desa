<!-- Navbar -->

<nav class="w-full bg-white/80 dark:bg-gray-800/80 backdrop-blur-md z-50 transition-all duration-300 border-b border-gray-200 dark:border-gray-700">
    <!-- Progress Bar -->
    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-primary-500 to-primary-600 dark:from-primary-400 dark:to-primary-500 transform origin-left scale-x-0 transition-transform duration-300"
         id="scroll-progress">
    </div>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Menu Section -->
            <div class="flex-1">
                @include('components.navbar.menu')
            </div>

            <!-- Mobile Button Section -->
            <div class="md:hidden">
                @include('components.navbar.mobile-button')
            </div>
        </div>
    </div>
</nav>




