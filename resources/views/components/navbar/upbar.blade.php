<style>
    .animated-gradient-pro {
        --color-1: #a855f7; /* Purple */
        --color-2: #3b82f6; /* Blue */
        --color-3: #ec4899; /* Pink */
        --color-4: #f59e0b; /* Amber */

        position: relative;
        overflow: hidden;
        background:
            radial-gradient(at 70% 30%, var(--color-1) 0px, transparent 50%),
            radial-gradient(at 0% 80%, var(--color-2) 0px, transparent 50%),
            radial-gradient(at 90% 90%, var(--color-3) 0px, transparent 50%),
            radial-gradient(at 20% 10%, var(--color-4) 0px, transparent 50%);
        background-color: #ffffff; /* Fallback light mode */
        background-size: 200% 200%;
        animation: gradient-pro 20s ease-in-out infinite;
    }

    .dark .animated-gradient-pro {
        --color-1: #581c87; /* Dark Purple */
        --color-2: #1e3a8a; /* Dark Blue */
        --color-3: #831843; /* Dark Pink */
        --color-4: #b45309; /* Dark Amber */
        background-color: #111827; /* Fallback dark mode */
    }

    @keyframes gradient-pro {
        0% {
            background-position: 0% 0%, 0% 100%, 100% 100%, 0% 0%;
        }
        25% {
            background-position: 0% 50%, 50% 100%, 100% 50%, 50% 0%;
        }
        50% {
            background-position: 100% 100%, 100% 0%, 0% 0%, 0% 100%;
        }
        75% {
            background-position: 50% 100%, 0% 50%, 50% 0%, 100% 50%;
        }
        100% {
            background-position: 0% 0%, 0% 100%, 100% 100%, 0% 0%;
        }
    }

    .waves-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%; 
        height: 10vh;
        min-height: 60px;
        max-height: 100px;
    }

    .waves {
        position: relative;
        width: 100%;
        height: 100%;
        margin-bottom: -7px; /* Fix for small gap */
    }

    .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5) infinite;
    }
    .parallax > use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 7s;
        fill: rgba(209, 213, 219, 0.7); /* gray-300 */
    }
    .parallax > use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 10s;
        fill: rgba(229, 231, 235, 0.5); /* gray-200 */
    }
    .parallax > use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 13s;
        fill: rgba(243, 244, 246, 0.3); /* gray-100 */
    }
    .parallax > use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s;
        fill: #ffffff;
    }

    .dark .parallax > use:nth-child(1) { fill: rgba(55, 65, 81, 0.7); } /* gray-700 */
    .dark .parallax > use:nth-child(2) { fill: rgba(75, 85, 99, 0.5); } /* gray-600 */
    .dark .parallax > use:nth-child(3) { fill: rgba(107, 114, 128, 0.3); } /* gray-500 */
    .dark .parallax > use:nth-child(4) { fill: #111827; } /* gray-900 */


    @keyframes move-forever {
        0% {
            transform: translate3d(-90px,0,0);
        }
        100% {
            transform: translate3d(85px,0,0);
        }
    }
</style>

<header 
    class="top-0 left-0 right-0 bg-center bg-cover bg-no-repeat relative text-gray-100 dark:text-white animated-gradient-pro"
>
    <div class="relative">
        <div class="absolute bg-gray-800 bg-opacity-60 dark:bg-black dark:bg-opacity-70 top-0 left-0 right-0 h-full"></div>

        <!-- Bagian Informasi Kontak -->
        <div class="relative z-20 flex flex-wrap bg-opacity-20 justify-between items-center px-4 py-2 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 transition-all rounded-lg">
            <div class="flex items-center space-x-4 bg-gray-300/60 dark:bg-gray-900 p-2 rounded-lg dark:text-white text-gray-900">
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4 dark:text-white text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <a href="mailto:desapasirpanjang@gmail.com" class="hover:text-blue-400 dark:hover:text-blue-600 transition-all">desapasirpanjang@gmail.com</a>
                </span>
            </div>

            <!-- Bagian Sosial Media -->
            <div class="flex items-center space-x-4">
                <a href="https://facebook.com/@desapasirpanjang" target="_blank" class="flex items-center space-x-2 p-2 rounded-full bg-gray-200 dark:bg-gray-800 hover:bg-blue-600 dark:hover:bg-blue-400 transition-all">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                </a>
                <a href="https://instagram.com/desa.pasirpanjang" target="_blank" class="flex items-center space-x-2 p-2 rounded-full bg-gray-200 dark:bg-gray-800 hover:bg-pink-500 dark:hover:bg-pink-400 transition-all">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="https://youtube.com/desa.pasirpanjang" target="_blank" class="flex items-center space-x-2 p-2 rounded-full bg-gray-200 dark:bg-gray-800 hover:bg-pink-500 dark:hover:bg-pink-400 transition-all">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="https://twitter.com/@DsPasirpanjang" target="_blank" class="flex items-center space-x-2 p-2 rounded-full bg-gray-200 dark:bg-gray-800 hover:bg-blue-400 dark:hover:bg-blue-300 transition-all">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <section class="relative z-10 text-center space-y-2 px-3 lg:px-5 py-6">
            <a href="{{ route('desa') }}">
                <figure>
                    <img src="{{ asset('images/logo-b.png') }}" alt="Logo Desa Pasirpanjang" class="h-16 mx-auto pb-2 ">
                </figure>
                <span class="text-h1 block">{{ config('app.name') }} </span>
                <p class="">
                    Kec. Salem, Kab. Brebes, Provinsi Jawa Tengah
                </p>
            </a>
        </section>
        
        <div class="block px-4 py-2 bg-white/60 text-gray-800 dark:bg-gray-900/60 dark:text-gray-300 bg-opacity-60 border border-white/30 dark:border-gray-800/50 rounded-md drop-shadow-lg z-20 relative transition-all mx-4">
            <marquee onmouseover="this.stop();" onmouseout="this.start();" class="block relative">
                <span class="px-3">
                    Selamat Datang di Website Resmi {{ config('app.name') }} Kecamatan Salem Kabupaten Brebes || Website Sistem Informasi Desa Merupakan Inovasi Dalam Pelayanan Dan Informasi Berbasis Digital...
                </span>
            </marquee>
        </div>
    </div>

    <!-- Animated Waves -->
    <div class="waves-container">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" />
                <use xlink:href="#gentle-wave" x="48" y="3" />
                <use xlink:href="#gentle-wave" x="48" y="5" />
                <use xlink:href="#gentle-wave" x="48" y="7" />
            </g>
        </svg>
    </div>
</header>