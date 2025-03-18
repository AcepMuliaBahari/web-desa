<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        // Fungsi untuk dropdown mobile
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }
    });
</script> 