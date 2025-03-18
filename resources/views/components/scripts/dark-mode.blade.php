<script>
        // Check initial dark mode state dan set icon yang sesuai
        function setInitialDarkMode() {
            const isDarkMode = localStorage.getItem('darkMode') === 'enabled' || 
                (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
            
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
                document.getElementById('sun-icon').classList.remove('hidden');
                document.getElementById('moon-icon').classList.add('hidden');
                document.getElementById('mobile-sun-icon').classList.remove('hidden');
                document.getElementById('mobile-moon-icon').classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                document.getElementById('sun-icon').classList.add('hidden');
                document.getElementById('moon-icon').classList.remove('hidden');
                document.getElementById('mobile-sun-icon').classList.add('hidden');
                document.getElementById('mobile-moon-icon').classList.remove('hidden');
            }
        }

        // Toggle dark mode dengan animasi
        function toggleDarkMode() {
            const isDark = document.documentElement.classList.toggle('dark');
            
            // Toggle icons desktop
            document.getElementById('sun-icon').classList.toggle('hidden');
            document.getElementById('moon-icon').classList.toggle('hidden');
            
            // Toggle icons mobile 
            document.getElementById('mobile-sun-icon').classList.toggle('hidden');
            document.getElementById('mobile-moon-icon').classList.toggle('hidden');
            
            // Save preference
            localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setInitialDarkMode();
            
            // Add click handlers
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            const mobileDarkModeToggle = document.getElementById('mobile-dark-mode-toggle');
            
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', toggleDarkMode);
            }
            
            if (mobileDarkModeToggle) {
                mobileDarkModeToggle.addEventListener('click', toggleDarkMode);
            }
        });

        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileDarkModeToggle = document.getElementById('mobile-dark-mode-toggle');
        const mobileSunIcon = document.getElementById('mobile-sun-icon');
        const mobileMoonIcon = document.getElementById('mobile-moon-icon');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        if (menuBtn && mobileMenu && closeBtn) {
            menuBtn.addEventListener('click', toggleMobileMenu);
            closeBtn.addEventListener('click', toggleMobileMenu);
            
            // Close menu when clicking outside
            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu) {
                    toggleMobileMenu();
                }
            });
        }

        // Dropdown toggle function
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const allDropdowns = document.querySelectorAll('[id$="-dropdown"]');
            const button = dropdown.previousElementSibling;
            const icon = button.querySelector('svg');
            
            allDropdowns.forEach(d => {
                if (d.id !== dropdownId && !d.classList.contains('hidden')) {
                    d.classList.add('hidden');
                    d.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
                }
            });

            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Mobile dark mode toggle
        if (mobileDarkModeToggle) {
            mobileDarkModeToggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                mobileSunIcon.classList.toggle('hidden');
                mobileMoonIcon.classList.toggle('hidden');
                localStorage.setItem('darkMode', 
                    document.documentElement.classList.contains('dark') ? 'enabled' : 'disabled'
                );
            });
        }
        function openFullscreen(imgSrc) {
        const modal = document.getElementById('fullscreenModal');
        const fullscreenImage = document.getElementById('fullscreenImage');
        const downloadBtn = document.getElementById('downloadBtn');
        
        modal.classList.remove('hidden');
        fullscreenImage.src = imgSrc;
        downloadBtn.href = imgSrc;
        document.body.style.overflow = 'hidden';
    }

    function closeFullscreen() {
        const modal = document.getElementById('fullscreenModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Menutup modal dengan tombol ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeFullscreen();
        }
    });
</script> 
